<?php

/**
 * Author: Mojib Rsm
 * Laravel 8.0 - MrBomber
 * All rights reserved
 */


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Bombing;
use Illuminate\Http\Request;
use App\Classes\CredentialChecker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            "users" => User::all(),
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

        session()->pull('admin_id');
        

        return redirect()->route('admin.index');
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

        if(session('admin_id') == 0){
            $admin->password = Hash::make($request->new_pass);
            $admin->save();
        }

        if(Hash::check(Hash::make($request->old_pass), $admin->password)){
            return back()->with("fail", "Invalid password");
        } else {
            if($request->new_pass == $request->new_pass_conf){
                $admin->password = Hash::make($request->new_pass);
                $admin->save();
                $request->session()->flash("admin_id");
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
