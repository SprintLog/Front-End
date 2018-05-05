<?php

namespace App\Http\Middleware;

use Closure;

class MustBeTeacher
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
      if($user && $user->typeUser == 1 ){
          return $next($request);
      }
      return back();
    }
}
