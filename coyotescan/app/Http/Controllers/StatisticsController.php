<?php

namespace App\Http\Controllers;

use App\Models\MacAddress;
use App\Models\Record;
use App\Models\Station;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    public function generalStatistics(Request $request){
        $search = $request->input('search');
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $stepType = empty($request->input('steptype'))? 5 : $request->input('steptype');
        $delta = empty($request->input('stepval'))? 1 : $request->input('stepval');

        switch ($stepType){
            case "1": $delta*=60; break;
            case "2": $delta*=60*60; break;
            case "3": $delta*=24*60*60; break;
            case "4": $delta*=7*24*60*60; break;
            case "5": $delta*=30*24*60*60; break;
            case "6": $delta*=364*24*60*60; break;
        }

        $stationList = empty($search)? Station::all() : Station::where('address', 'LIKE', "%{$search}%")->get();
        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $resultList = Record::generalStatistics($stationList, $timeStart, $timeFinish, $delta, $marked);
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
            case "1": $delta*=60; break;
            case "2": $delta*=60*60; break;
            case "3": $delta*=24*60*60; break;
            case "4": $delta*=7*24*60*60; break;
            case "5": $delta*=30*24*60*60; break;
            case "6": $delta*=364*24*60*60; break;
        }

        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $resultList = Station::stationStatistics($id, $timeStart, $timeFinish, $delta, $marked, $search);

        return view('stationStatistics', ['data'=>$resultList, 'id'=>$id]);
    }

    public function macAddressStatistics(Request $request, $id){
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $resultList = MacAddress::macAddressStatistics($id, $timeStart, $timeFinish, $marked);

        return view('macAddressStatistics', ['data'=>$resultList, 'id'=>$id]);
    }
}
