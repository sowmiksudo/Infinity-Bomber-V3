<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show(){
        $settings = Setting::first();

        return view('admin.settings')->with([
            'settings'=>$settings
        ]);

    }


    public function update(Request $request){


        $settings = Setting::all()->first();

        $settings->admin_contact = $request->input('admin_contact');
        $settings->app_name = $request->input('app_name');
        $settings->max_bombing = $request->input('max_bombing');
        $settings->notice = $request->input('notice');
        $settings->ga_id = $request->input('ga_id');
        $settings->facebook_link = $request->input('facebook_link');
        $settings->youtube_link = $request->input('youtube_link');
        $settings->max_load = $request->input('max_load');
        $settings->max_load_text = $request->input('max_load_text');
        $settings->forbidden_text = $request->input('forbidden_text');
        $settings->footer = $request->input('footer');
        $settings->protect_notice = $request->input('protect_notice');
        $settings->share_text = $request->input('share_text');
        $settings->public_bombing_page = ($request->input('public_bombing_page') === 'on') ? 1 : 0;
        $settings->use_multi_threads = ($request->input('use_multi_threads') === 'on') ? 1 : 0;

        $saved = $settings->save();

        if($saved){
            return back()->with('success', 'Settings Updated!');
        }
        return back()->with('fail', 'Something went wrong!');

    }
}
