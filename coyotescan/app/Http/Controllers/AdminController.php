<?php

namespace App\Http\Controllers;

use App\Models\MacAddress;
use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function stationPage()
    {
        $data = [];
        foreach (Station::all() as $stat) {
            $data[] = ['address' => $stat->address, 'name' => $stat->name, 'id' => $stat->id, 'isOutdated' => $stat->isOutdated];
        }
        return view('admin.stationManagement', ['data' => $data]);
    }

    public function stationSearch(Request $request)
    {
        $search = $request->input('search');
        $data = [];
        if (!empty(Station::where('address', 'LIKE', "%{$search}%"))) {
            foreach (Station::where('address', 'LIKE', "%{$search}%")->get() as $stat) {
                $data[] = ['address' => $stat->address, 'name' => $stat->name, 'id' => $stat->id, 'isOutdated' => $stat->isOutdated];
            }
        }
        return view('admin.stationManagement', ['data' => $data]);
    }

    public function stationChange(Request $request, $id)
    {
        $station = Station::where('id', $id);
        if ($station->value('isOutdated') == 0) {
            $station->update(['isOutdated' => 1]);
        } else {
            $station->update(['isOutdated' => 0]);
        }
        return redirect()->route('stationAdminPage');
    }

    public function stationAdd(Request $request){
        $name = $request->input('name');
        $address = $request->input('address');
        $record = Station::where('address', $address)->where('name', $name);
        if(empty($record->first())){
            $station = new Station();
            $station->name = $name;
            $station->address = $address;
            $station->save();
        }

        return redirect()->route('stationAdminPage');
    }

    public function userPage()
    {
        $data = [];
        foreach (User::all() as $user) {
            $data[] = ['fio' => $user->sname." ".$user->name." ".$user->fname, 'id' => $user->id, 'isMarked' => $user->isMarked];
        }
        return view('admin.userManagement', ['data' => $data]);
    }

    public function userSearch(Request $request)
    {
        $search = $request->input('search');
        $data = [];
        if (!empty(User::where('name', 'LIKE', "%{$search}%")->orWhere('sname', 'LIKE', "%{$search}%")->orWhere('fname', 'LIKE', "%{$search}%"))) {
            foreach (User::where('name', 'LIKE', "%{$search}%")->orWhere('sname', 'LIKE', "%{$search}%")->orWhere('fname', 'LIKE', "%{$search}%")->get() as $user) {
                $data[] = ['fio' => $user->sname." ".$user->name." ".$user->fname, 'id' => $user->id, 'isMarked' => $user->isMarked];
            }
        }
        return view('admin.userManagement', ['data' => $data]);
    }

    public function userChange(Request $request, $id)
    {
        $user = User::where('id', $id);
        if ($user->value('isMarked') == 0) {
            $user->update(['isMarked' => 1]);
            MacAddress::where('user_id', $id)->update(['isMarked' => 1]);
        } else {
            $user->update(['isMarked' => 0]);
            MacAddress::where('user_id', $id)->update(['isMarked' => 0]);
        }
        return redirect()->route('userAdminPage');
    }

    public function macPage()
    {
        $data = [];
        foreach (MacAddress::all() as $mac) {
            $data[] = ['address' => $mac->address, 'id' => $mac->id, 'isMarked' => $mac->isMarked];
        }
        return view('admin.macManagement', ['data' => $data]);
    }

    public function macSearch(Request $request)
    {
        $search = $request->input('search');
        $data = [];
        if (!empty(MacAddress::where('address', 'LIKE', "%{$search}%"))) {
            foreach (MacAddress::where('address', 'LIKE', "%{$search}%")->get() as $mac) {
                $data[] = ['address' => $mac->address, 'id' => $mac->id, 'isMarked' => $mac->isMarked];
            }
        }
        return view('admin.macManagement', ['data' => $data]);
    }

    public function macChange(Request $request, $id)
    {
        $mac = MacAddress::where('id', $id);
        if ($mac->value('isMarked') == 0) {
            $mac->update(['isMarked' => 1]);
        } else {
            $mac->update(['isMarked' => 0]);
        }
        return redirect()->route('macAdminPage');
    }

    public function appPage()
    {
        return view('admin.applicationSettings');
    }
}
