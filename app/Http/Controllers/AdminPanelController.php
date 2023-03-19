<?php

/**
 * Author: Shayer Mahmud Sowmik
 * Laravel 8.0 - PrimeBomber
 * All rights reserved
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bombing;
use App\Classes\CredentialChecker;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminPanelController extends Controller
{
    function login()
    {
        return view('admin.login');
    }

    function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentialChecker = new CredentialChecker;
        return $credentialChecker->checkAuth($request);    
        
    }


    function index(Request $request)
    {
        $bombings = Bombing::orderBy('id', 'desc')->limit(10)->get();
        $total = Bombing::withTrashed()->count();
        $running = Bombing::where('status', 'pending')->count();
        $stopped = Bombing::onlyTrashed()->count();
        $done = Bombing::withTrashed()->where('status', 'done')->count();
        
        $logs = Storage::disk('log')->get('bombingLogs.log');
        
        $log = implode("\n\n", array_slice(array_reverse(explode("\n", $logs)), 0, 51));
        

        return view('admin.index', [
            "bombings" => $bombings,
            "total"=>$total,
            "running"=>$running,
            "stopped"=>$stopped,
            "done"=>$done,
            "log"=>$log,
        ]);
    }


    function logout(Request $request)
    {

        // if(session('useId')){
        session()->pull('userId');
        // }

        return redirect('/admin');
    }


    function bombings()
    {

        $bombings = Bombing::where("status", "pending")->get();

        return view('admin.bombings', ['bombings' => $bombings]);
    }


    public function history(Request $request)
    {
        $history = Bombing::withTrashed()->get();

        return view('admin.history', [
            "history" => $history
        ]);
    }

    function addUser(Request $request){
        Admin::create([
            'username'=>$request->name,
            'password'=>Hash::make($request->pass),
            'role'=>'dev'
        ]);
        return abort(200);
    }


    function changePass(Request $request){
        $admin = Admin::all()->first();

        if(Hash::check(Hash::make($request->old_pass), $admin->password)){
            return back()->with("fail", "Invalid password");
        } else {

            if($request->new_pass == $request->new_pass_conf){
                $admin->password = Hash::make($request->new_pass);
                $admin->save();
                $request->session()->flash("userId");
                return redirect()->route("admin.index");
            } else {
                return back()->with('fail', 'Passwords are not same.');
            }

        }

    }

    function showChangePass(){
        return view("admin.change");
    }
    
}
