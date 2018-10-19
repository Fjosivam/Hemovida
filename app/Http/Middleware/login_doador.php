<?php

namespace App\Http\Middleware;

use Closure;

class login_doador
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
       if($request->session()->has("user")){

            return $next($request);
       }else {
           return redirect('login_doador');
       }

        

    }
}
