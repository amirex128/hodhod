<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
class UserGeneral
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


        $response = $next($request);


        if (auth()->check()) {
            if (auth()->user()->roles->contains('id',3)){
                abort(403,"شما نباید در این صفحه باشید");

            }else{
                return $response; //don't forget
            }
        }else{
            return $response; //don't forget

        }

    }
}
