<?php

namespace App\Http\Middleware;

use Closure;
use IIluminate\Http\Request;
use Auth;
use Session;


class Impersonate
{   /**

    @param
    @param
    @return
     */
   public function handle(Request $request,Closure $next)
   {
       if(Session()->has('impersonate')){
           Auth::onceUsingId(session('impersonate'));

       }
       return $next($request);
   }


}
