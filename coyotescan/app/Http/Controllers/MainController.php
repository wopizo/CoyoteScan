<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\MacAddress;
use App\Models\Record;

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
}
