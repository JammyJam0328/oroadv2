<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Requestor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role!='requestor'){
            return redirect('/dashboard');
        }

        if (auth()->user()->hasInformation==false) {
            return redirect()->route('requestor.set-up-information');
        }
        
        return $next($request);
    }
}