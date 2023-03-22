<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class CheckExpiryMiddleware
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
        $user = User::find($request->session()->get('user_id'));
        if($user && $user->expires_at < Carbon::now()){
            return redirect()->route('user.expired');
        }
        return $next($request);
    }
}
