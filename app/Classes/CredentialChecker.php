<?php

namespace App\Classes;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


/**
 * Class to check the username and password
 */

class CredentialChecker
{
    /**
     * checkAuth function to check if User is either valid or the developer.
     */

    public function checkAuth(Request $request)
    {
                
        if ($request->input('username') == "dev" && Hash::check($request->input('password'), Hash::make('dev'))) {
            $request->session()->put('userId', 0);
            return redirect('/admin');
        } 

    
        $userInfo = Admin::where('username', $request->input('username'))->get()->first();

        
        
        if (!isset($userInfo->id)) {
            return back()->with('fail', 'User not found!');
        } else {
            if (Hash::check($request->input('password'), $userInfo->password)) {
                $request->session()->put('userId', $userInfo->id);
                return Redirect::route('admin.index');
            } else {
                return back()->with('fail', "Invalid password");
            }
        }
    }
}
