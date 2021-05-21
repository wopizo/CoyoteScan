<?php

namespace App\Http\Controllers;

use App\Models\EntryRecord;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\MacAddress;
use App\Models\Record;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function stationData(string $data){

        preg_match_all("/INQ:[\d\w]*:[\d\w]*:[\d\w]*,/",$data,$urlString);
        $addresses = $urlString[0];

        if(count($addresses)>0){
            preg_match_all("[\d\w]*_/",$data,$nameStation);
            $record = new Record();
            $record->station_id = Station::firstWhere('name', $nameStation[0])->id;
            $record->save();
            foreach ($addresses as $address){
                $mac = new MacAddress();
                $mac->address = $address;
                $mac->isMarked = 0;
                $mac->save();
            }
        }
        return $data;
    }

    public function statistics(){
        return view('statistics');
    }

    public function generalStatistics(Request $request){
        $search = $request->input('search');
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $stepType = empty($request->input('steptype'))? 5 : $request->input('steptype');
        $delta = empty($request->input('stepval'))? 1 : $request->input('stepval');

        switch ($stepType){
            case "1":
                $delta*=60;
                break;
            case "2":
                $delta*=60*60;
                break;
            case "3":
                $delta*=24*60*60;
                break;
            case "4":
                $delta*=7*24*60*60;
                break;
            case "5":
                $delta*=30*24*60*60;
                break;
            case "6":
                $delta*=364*24*60*60;
                break;
        }

        $resultList = array();
        $stationList = empty($search)? Station::all() : Station::where('address', 'like', '%'.$search.'%');
        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $query = 'SELECT COUNT(DISTINCT mac.address) as res
                    FROM records rec
                        JOIN stations st ON st.id = rec.station_id
                        JOIN entry_records entry ON rec.id = entry.record_id
                        JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                    WHERE rec.time >= ? AND rec.time < ? AND st.id = ?';

        if(!empty($marked) && $marked == true){
            $query .= ' AND mac.isMarked = 1';
        }

        foreach ($stationList as $station){
            $timeStartNew = $timeStart;

            $count = 0;
            while ($timeStartNew < $timeFinish){
                $timeFinishNew = $timeStartNew + $delta;
                $count += DB::select($query, [
                    date("Y-m-d H:i:s", $timeStartNew),
                    date("Y-m-d H:i:s", $timeFinishNew),
                    $station->id])[0]->res;

                $timeStartNew+=$delta;
            }
            $resultList[] = ['address' => $station->address, 'count' => $count];
        }

        return view('statistics', ['data'=>$resultList]);
    }

    public function stationStatistics(Request $request, $id){
        $search = $request->input('search');
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $stepType = empty($request->input('steptype'))? 5 : $request->input('steptype');
        $delta = empty($request->input('stepval'))? 1 : $request->input('stepval');
        switch ($stepType){
            case "1":
                $delta*=60;
                break;
            case "2":
                $delta*=60*60;
                break;
            case "3":
                $delta*=24*60*60;
                break;
            case "4":
                $delta*=7*24*60*60;
                break;
            case "5":
                $delta*=30*24*60*60;
                break;
            case "6":
                $delta*=364*24*60*60;
                break;
        }


        $resultList = array();
//        $stationList = empty($search)? Station::all() : Station::where('address', 'like', '%'.$search.'%');
        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $query = 'SELECT DISTINCT mac.address as res
                    FROM records rec
                        JOIN stations st ON st.id = rec.station_id
                        JOIN entry_records entry ON rec.id = entry.record_id
                        JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                    WHERE rec.time >= ? AND rec.time < ? AND st.id = ?';

        if(!empty($marked) && $marked == true){
            $query .= ' AND mac.isMarked = 1';
        }

        $timeStartNew = $timeStart;

        while ($timeStartNew < $timeFinish){
            $timeFinishNew = $timeStartNew + $delta;

            $mac_addresses = DB::select($query, [
                date("Y-m-d H:i:s", $timeStartNew),
                date("Y-m-d H:i:s", $timeFinishNew),
                $id]);

            $addresses = [];
            foreach($mac_addresses as $mac){
                $addresses[] = $mac->res;
            }
            if(!empty($addresses)){
                $resultList[] = ['time' => date("Y-m-d H:i:s", $timeFinishNew), 'mac_addresses' => $addresses];
            }

            $timeStartNew+=$delta;
        }

        return view('stationStatistics', ['data'=>$resultList, 'id'=>$id]);
    }

    public function macAddressStatistics(Request $request, $id){
        $search = $request->input('search');
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $resultList = array();
//        $stationList = empty($search)? Station::all() : Station::where('address', 'like', '%'.$search.'%');
        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $query_first_record = 'SELECT MIN(rec.time) as time, rec.station_id as station_id, st.address as address
                            FROM records rec
                                JOIN stations st ON st.id = rec.station_id
                                JOIN entry_records entry ON rec.id = entry.record_id
                                JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                            WHERE mac_address_id = ? AND rec.time >= ? AND rec.time < ?
                            GROUP BY rec.time, rec.station_id, st.address';

        $query_record = 'SELECT MIN(rec.time) as time, rec.station_id as station_id , st.address as address
                        FROM records rec
                            JOIN stations st ON st.id = rec.station_id
                            JOIN entry_records entry ON rec.id = entry.record_id
                            JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                        WHERE rec.time > ? AND rec.station_id <> ? AND mac_address_id = ?
                        GROUP BY rec.time, rec.station_id, st.address';

        $query_mac_addresses = 'SELECT DISTINCT mac.address as mac_address
                                FROM records rec
                                    JOIN entry_records entry ON rec.id = entry.record_id
                                    JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                                WHERE rec.time >= ? AND rec.time < ? AND rec.station_id = ?';

        if(!empty($marked) && $marked == true){
            $query_record .= ' AND mac.isMarked = 1';
            $query_mac_addresses .= ' AND mac.isMarked = 1';
        }

        $first_record = DB::select($query_first_record, [
            $id,
            date("Y-m-d H:i:s", $timeStart),
            date("Y-m-d H:i:s", $timeFinish)]);

        $timeStartNew = $first_record[0]->time;
        $stationId = $first_record[0]->station_id;
        $stationAddress = $first_record[0]->address;

        while (strtotime($timeStartNew) < $timeFinish){
            $record = DB::select($query_record, [$timeStartNew, $stationId, $id]);
            if(!empty($record[0])){
                $timeFinishNew = $record[0]->time;
                $stationIdNew = $record[0]->station_id;
                $stationAddressNew = $record[0]->address;
            }else{
                $timeFinishNew = date("Y-m-d H:i:s", $timeFinish);
            }

            $mac_addresses = DB::select($query_mac_addresses, [ $timeStartNew, $timeFinishNew, $stationId]);
            $addresses = [];
            foreach($mac_addresses as $mac){
                $addresses[] = $mac->mac_address;
            }
            if(!empty($addresses)){
                $resultList[] = [
                    'address' => $stationAddress,
                    'time' => $timeStartNew." - ".$timeFinishNew,
                    'mac_addresses' => $addresses
                ];
            }

            $timeStartNew = $timeFinishNew;
            $stationId = $stationIdNew;
            $stationAddress = $stationAddressNew;
        }

        return view('macAddressStatistics', ['data'=>$resultList, 'id'=>$id]);
    }
}
