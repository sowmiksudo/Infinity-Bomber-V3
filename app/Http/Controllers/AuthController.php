<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function show_login()
    {
        return view('public.login');
    }

    public function show_register()
    {
        return view('public.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Invalid Credentials');
        }


        if (Hash::check($request->password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect()->route('user.bomber');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function register(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:11|unique:users,phone',
            'password' => 'required|min:6',
        ]);

        $arr = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($arr);
        $request->session()->put('user_id', $user->id);
        return redirect()->route('user.bomber');
    }

    public function approval(){
        return view('public.approval');
    }
}
