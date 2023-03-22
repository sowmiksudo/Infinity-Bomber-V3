<?php

/**
 * author : Mojib Rsm
 * Laravel 8.0 - MrBomber
 * All rights reserved
 */


namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Blacklist;
use App\Models\Bombing;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class BombingController extends Controller
{


    private function user()
    {
        if (session()->has('user_id')) {
            $user = User::find(session()->get('user_id'));
        }
        if (session()->has('admin_id')) {
            $user = json_decode('
            {
                "name":"0xadmin"
            }
            ');
        }
        return $user;
    }


    function publicPage()
    {
        $settings = Setting::all()->first();
        if ($settings->public_bombing_page) {
            return view('public.index')->with([
                'settings' => $settings,
                'notices' => Notice::all()
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
        ]);

        $settings = Setting::all()->first();

        $max = $settings->max_bombing;


        $user = $this->user();

        if ($user->name !== '0xadmin') {
            if ($request->input('amount') > $user->limit) {
                return back()->with('fail', 'Max amount is set to ' . $user->limit);
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



        if ($user->name == '0xadmin') {
            $bombing = Bombing::create([
                'target' => $request->input('number'),
                'threads' => $request->input('threads'),
                'amount' => $request->input('amount'),
                'user_id' => null,
                'user_agent' => request()->userAgent(),
                'ip' => request()->ip(),
            ]);
        } else {
            $bombing = $this->user()->bombings()->create([
                'target' => $request->input('number'),
                'threads' => $request->input('threads'),
                'amount' => $request->input('amount'),
                'user_agent' => request()->userAgent(),
                'ip' => request()->ip(),
            ]);
        }

        if ($bombing) {
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

    public function stopBombing(Request $request)
    {
        Bombing::where("target", $request->number)->delete();
        return Bombing::all()->toJson();
    }
}
