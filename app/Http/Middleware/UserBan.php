<?php

namespace App\Http\Middleware;

use Closure;

class UserBan
{
    /**
     * Handle an incoming request.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (auth()->check()){
            if (auth()->user()->status==1){
                return $response; //don't forget

            }else{
                return response(["error"=>'شما به دلیل رعایت نکردن قوانین ما مسدود شده اید'],403);
            }
        }else{
            return $response; //don't forget

        }


//

    }
}
