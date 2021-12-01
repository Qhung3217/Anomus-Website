<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if (Auth::guard('admin')->check()){
            return $next($request)
            ->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidte')
            ->header('Pragma', 'no-cache')
            ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
        }
        return redirect()->route('login');
    }
}
