<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Faculty
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
        if ((auth()->user() &&  (auth()->user()->user_type == 'basicEd' || auth()->user()->user_type == 'college'))) {
            return $next($request);
        }

        if(auth()->user() && auth()->user()->user_type == 'uro'){
            return redirect('/evaluator-uro');
        }

        if(auth()->user() && auth()->user()->user_type == 'oces'){
            return redirect('/evaluator-oces');
        }

        if(auth()->user() && auth()->user()->user_type == 'dean'){
            return redirect('/dean');
        }

        if(auth()->user() && auth()->user()->user_type == 'admin'){
            return redirect('/admin');
        }
        

        return redirect('/');
       
    }
}
