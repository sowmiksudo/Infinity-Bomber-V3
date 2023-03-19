<?php

/**
 * Author: Shayer Mahmud Sowmik
 * Laravel 8.0 - PrimeBomber
 * All rights reserved
 */


namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Blacklist;
use App\Models\Bombing;
use Illuminate\Http\Request;

class BombingController extends Controller
{


    function publicPage()
    {
        $settings = Setting::all()->first();
        if ($settings->public_bombing_page) {
            return view('public.index')->with([
                'settings' => $settings
            ]);
        } else {
            return view('errors.disabled')->with([
                'settings' => Setting::all()->first()
            ]);
        }
    }


    function show()
    {
        return view('admin.addBombing');
    }


    function addApi(Request $request)
    {
        $created = Bombing::create([
            'target' => $request->number,
            'amount' => $request->amount,
            'threads' => $request->threads,
            'note' => $request->note
        ]);

        if ($created) {
            return ['success', $request->input('number') . ' Added to Bombings.'];
        }

        return ['fail', 'Unexpected Error'];
    }


    function add(Request $request)
    {

        $request->validate([
            'number' => 'required|size:11',
            'threads' => 'numeric|max:5',
            'amount' => 'required|numeric|',
            'note' => 'max:50'
        ]);

        $settings = Setting::all()->first();

        $max = $settings->max_bombing;


        if ($request->input("fromAdminPanel") !== "on") {
            if ($request->input('amount') > $max) {
                return back()->with('fail', 'Max amount is set to ' . $max);
            }
        }

        $blisted = Blacklist::where('number', $request->input('number'))->first();

        if (isset($blisted->id)) {
            return back()->with('fail', $blisted->message);
        }

        $running = Bombing::where("status", "pending")->count();

        if ($running > $settings->max_load) {
            return back()->with("fail", $settings->max_load_text);
        }

        $created = Bombing::create([
            'target' => $request->input('number'),
            'threads' => $request->input('threads'),
            'amount' => $request->input('amount'),
            'note' => $request->input('note')
        ]);

        if ($created) {
            return back()->with('success', $request->input('number') . ' Added to Bombings.');
        }

        return back()->with('fail', 'Unexpected Error');
    }


    public function delete(Request $request)
    {
        $deleted = Bombing::destroy($request->id);

        if ($deleted) {
            return back()->with('success', 'Moved to trash');
        } else {
            return back()->with('fail', 'Unexpected Error');
        }
    }

    public function stopBombing(Request $request){
        Bombing::where("target", $request->number)->delete();
        return Bombing::all()->toJson();
    }

}
