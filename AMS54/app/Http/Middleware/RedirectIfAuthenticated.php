<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
               if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }
                break;

                 case 'seller':
               if (Auth::guard('seller')->check()) {
            return redirect('/seller');
        }
                break;
            
            default:
                 
             if (Auth::guard('web')->check()) {
            return redirect('/home');
        }
       
                break;
        }

        

        return $next($request);
    }
}
