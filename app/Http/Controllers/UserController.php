<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function users(){
        $users = User::orderBy('id', 'desc')->paginate(30);
        return view('admin.users')->with([
            'users' => $users
        ]);

    }

    public function verify(Request $request){
        $user = User::findOrFail($request->input('user_id'));

        $user->limit = $request->limit;
        $user->approved = true;
        $user->save();

        return back();
    }
    
    
    public function unverify(Request $request){
        $user = User::findOrFail($request->input('user_id'));

        $user->limit = $request->limit;
        $user->approved = false;
        $user->save();

        return back();
    }

    public function reset_index(){
        return view('public.reset', [
            'settings' => Setting::all()->first(),
            'notices' => Notice::all()
        ]);
    }

    public function reset_store(Request $request){
        $user = User::find(session('user_id'));
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'min:6|confirmed|required'
        ]);

        if(!Hash::check($request->input('old_password'), $user->password)){
            return back()->with('fail', 'Invalid password');
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return back()->with('success', 'Password resetted');
    }

}
