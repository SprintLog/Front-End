<?php

namespace App\Http\Middleware;

use Closure;

class MustBeStudent
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
        $user = $request->user();
        if($user && $user->typeUser == 0 ){
            return $next($request);
        }
        return back();
    }
}
