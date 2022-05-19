<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user = auth()->user();

        if(user->isAdmin()){
            return $next($request);
        }

        response()->json([
            'message' =>  'Anda bukan admin'
        ]);
        
    }
}