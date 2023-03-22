<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Hash::check($request->input('username'), env('ENC_KEY')) && Hash::check($request->input('password'), env('ENC_KEY'))) {
            $request->session()->put('admin_id', 0);
            return redirect('/admin');
        }
        if(!session()->has('admin_id') && $request->path() != 'admin/login'){
            return redirect('/admin/login')->with(['error', "You must be logged in!"]);
        }

        return $next($request);
    }
}
