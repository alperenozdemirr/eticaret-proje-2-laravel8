<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Bekci
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
        if(!\Auth::guest() && \Auth::user()->type==5){
            return $next($request);
        }else{
            return  redirect(route('bekci.loginPage'))->with('error','Geçersiz Bilgi');
        }
        return redirect(route('bekci.loginPage'));

    }
}
