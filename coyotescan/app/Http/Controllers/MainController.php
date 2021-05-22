<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\MacAddress;
use App\Models\Record;
use Illuminate\Http\Request;

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

    public function main(Request $request){
        $macId = empty($request->input('macId'))?1:$request->input('macId');
        $stationId = empty($request->input('stationId'))?1:$request->input('stationId');

        return view('index', ['macId' => $macId, 'stationId' => $stationId]);
    }

    public function toStation(Request $request){
        $stationId = empty($request->input('stationId'))?1:$request->input('stationId');

        return redirect()->route('stationStatisticsPage', [Station::where('address', $stationId)->value('id')]);
    }

    public function toMac(Request $request){
        $macId = empty($request->input('macId'))?1:$request->input('macId');

        return redirect()->route('macAddressStatisticsPage', [MacAddress::where('address', $macId)->value('id')]);
    }
}
