<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth_user=Auth::user();/*->whereHas('role', function (Builder $query) {
            $query->where('name','admin');
        })->get();*/


        if($auth_user->role->name==='admin'){
            return $next($request);
        }else{
            abort(403, 'Unauthorized action.');
        }

        /*foreach ($auth_user->role as $user){
            if($user->name=='admin'){
                return $next($request);
            }else{
                abort(403, 'Unauthorized action.');
            }

        }*/

    }
}
