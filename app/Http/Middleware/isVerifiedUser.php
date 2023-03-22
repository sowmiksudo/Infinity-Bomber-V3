<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class isVerifiedUser
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

        $id = request()->session()->get('user_id');
        if(!$id){
            return redirect()->route('user.login.index');
        }

        $user = User::find($id);

        if(!$user->approved){
            return redirect()->route('user.approval');
        }


        return $next($request);
    }
}
