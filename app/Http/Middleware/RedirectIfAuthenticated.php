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
        case 'personal_info':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('head.index');
          }
          break;
        case 'customers':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('product.index');
          }
          break;
        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/home');
          }
          break;

        }
        return $next($request);
    }
}
