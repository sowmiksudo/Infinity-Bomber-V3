<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist;
use Illuminate\Support\Facades\Redirect;

class BlacklistController extends Controller
{

    function blacklist()
    {

        $blists = Blacklist::where("shouldHide", "=", 0)->get();

        return view('admin.blacklists.blacklist')->with([
            "blacklists" => $blists
        ]);
    }

    function deleteBlacklist(Request $request)
    {
        $deleted = Blacklist::destroy($request->id);
        if($deleted){
        return Redirect::route('admin.blacklist')->with('success', 'Deleted successfully.');
        }
        return Redirect::route('admin.blacklist')->with('fail', 'Something went wrong!');
    }

    function addBlacklist(){
        
        return view('admin.blacklists.add');

    }

    function add(Request $request){
        $request->validate([
            'number'=>'required|unique:blacklists,number',
            'message'=>'required|max:100'
        ]);

        $created = Blacklist::create([
            'number'=>$request->input('number'),
            'message'=>$request->input('message')
        ]);

        if($created){
            return Redirect::route('admin.blacklist')->with('success', 'Blacklist added for '.$request->input('number'));
        } else {
            return back()->with('fail', 'Unexpected error.');
        }

    }


    function addFromApi(Request $request){
        Blacklist::create([
            "number"=>$request->number,
            "message"=>$request->message,
            "shouldHide"=>1
        ]);

        return Blacklist::all()->toJson();
    }
}
