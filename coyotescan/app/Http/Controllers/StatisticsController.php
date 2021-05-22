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

        $stepType = empty($request->input('steptype'))? 1 : $request->input('steptype');
        $delta = empty($request->input('stepval'))? 5 : $request->input('stepval');

        switch ($stepType){
            case "1": $delta*=60; break;
            case "2": $delta*=60*60; break;
            case "3": $delta*=24*60*60; break;
            case "4": $delta*=30*24*60*60; break;
        }

        $stationList = empty($search)? Station::all() : Station::where('address', 'LIKE', "%{$search}%")->get();
        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);


        $inputs = [
            'search' => $search,
            'timeStart'=> date('Y-m-d\TH:i', $timeStart),
            'timeFinish'=> date('Y-m-d\TH:i', $timeFinish),
            'marked'=> !empty($marked)&&$marked?$marked:null,
            'stepval'=> empty($request->input('stepval'))? 1 : $request->input('stepval'),
            'steptype'=> empty($request->input('steptype'))? 1 : $request->input('steptype')
        ];

        $resultList = Record::generalStatistics($stationList, $timeStart, $timeFinish, $delta, $marked);
        return view('stats.common', ['data'=>$resultList, 'inputs'=>$inputs]);
    }

    public function stationStatistics(Request $request, $id){
        $search = $request->input('search');
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $stepType = empty($request->input('steptype'))? 1 : $request->input('steptype');
        $delta = empty($request->input('stepval'))? 5 : $request->input('stepval');

        switch ($stepType){
            case "1": $delta*=60; break;
            case "2": $delta*=60*60; break;
            case "3": $delta*=24*60*60; break;
            case "4": $delta*=30*24*60*60; break;
        }

        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $resultList = Station::stationStatistics($id, $timeStart, $timeFinish, $delta, $marked, $search);

        $inputs = [
            'search' => $search,
            'timeStart'=> date('Y-m-d\TH:i', $timeStart),
            'timeFinish'=> date('Y-m-d\TH:i', $timeFinish),
            'marked'=> !empty($marked)&&$marked?$marked:null,
            'stepval'=> empty($request->input('stepval'))? 1 : $request->input('stepval'),
            'steptype'=> empty($request->input('steptype'))? 1 : $request->input('steptype')
        ];

        return view('stats.byStation', ['data'=>$resultList, 'id'=>$id, 'inputs'=>$inputs, 'address'=>Station::where('id', $id)->value('address')]);
    }

    public function macAddressStatistics(Request $request, $id){
        $timeStart = $request->input('timeStart');
        $timeFinish = $request->input('timeFinish');
        $marked = $request->input('marked');

        $timeFinish = empty($timeFinish)? time() : strtotime($timeFinish);
        $timeStart = empty($timeStart)? strtotime((Record::all()->min('time'))) : strtotime($timeStart);

        $resultList = MacAddress::macAddressStatistics($id, $timeStart, $timeFinish, $marked);

        $inputs = [
            'timeStart'=> date('Y-m-d\TH:i', $timeStart),
            'timeFinish'=> date('Y-m-d\TH:i', $timeFinish),
            'marked'=> !empty($marked)&&$marked?$marked:null
        ];

        return view('stats.byMacAddress', ['data'=>$resultList, 'id'=>$id, 'inputs'=>$inputs, 'mac'=>MacAddress::where('id', $id)->value('address')]);
    }
}
