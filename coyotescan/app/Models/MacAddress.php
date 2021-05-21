<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MacAddress extends Model
{
    use HasFactory;

    public function entryRecordes(){
        return $this->hasMany(EntryRecord::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function macAddressStatistics($id, $timeStart, $timeFinish, $marked){
        $resultList = array();
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
                        WHERE rec.time > ? AND rec.station_id <> ? AND mac_address_id = ?';
        $query_record .= (!empty($marked) && $marked == true)?' AND mac.isMarked = 1 GROUP BY rec.time, rec.station_id, st.address':' GROUP BY rec.time, rec.station_id, st.address';

        $query_mac_addresses = 'SELECT DISTINCT mac.address as mac_address
                                FROM records rec
                                    JOIN entry_records entry ON rec.id = entry.record_id
                                    JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                                WHERE rec.time >= ? AND rec.time < ? AND rec.station_id = ?';
        if(!empty($marked) && $marked == true){
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
            if(!empty($stationIdNew) && !empty($stationAddressNew)){
                $stationId = $stationIdNew;
                $stationAddress = $stationAddressNew;
            }
        }
        return $resultList;
    }
}
