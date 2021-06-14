<?php

namespace App\Http\Controllers;

use App\Models\MacAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $data = [];
        foreach (Auth::user()->macAddresses as $mac) {
            $data[] = ['address'=>$mac->address, 'id'=>$mac->id];
        }
        return view('user.profile', ['data'=>$data]);
    }

    public function editMac(Request $request, $id){
        MacAddress::where('id', $id)->update(['user_id' => 0]);
        return redirect()->route('profile');
    }

    public function editMarked(){
        $user = User::where('id', Auth::user()->id);
        if(Auth::user()->isMarked == 0){
            $user->update(['isMarked' => 1]);
            MacAddress::where('user_id', Auth::user()->id)->update(['isMarked' => 1]);
        }else{
            $user->update(['isMarked' => 0]);
            MacAddress::where('user_id', Auth::user()->id)->update(['isMarked' => 0]);
        }
        return redirect()->route('profile');
    }

    public function addMac(Request $request){
        $address = $request->input('mac');
        if(!empty(MacAddress::where('address', $address)->first())){
            MacAddress::where('address', $address)->update(['user_id' => Auth::user()->id]);
            MacAddress::where('user_id', Auth::user()->id)->update(['isMarked' => Auth::user()->isMarked]);
        }
        return redirect()->route('profile');
    }

    public function editNames(Request $request){
        User::where('id', Auth::user()->id)->update(
            [
                'name' => $request->input('name'),
                'sname' => $request->input('sname'),
                'fname' => $request->input('fname')
            ]);
        return redirect()->route('profile');
    }
}
