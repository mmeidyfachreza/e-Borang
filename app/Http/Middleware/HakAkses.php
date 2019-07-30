<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $reqrole)
    {
        $roles = explode('|', $reqrole);
        foreach ($roles as $role) {
            if (Auth::check() && Auth::user()->roles->first()->name == $role) {
                return $next($request);
            }
        }
            return redirect('/login');
    }
}
