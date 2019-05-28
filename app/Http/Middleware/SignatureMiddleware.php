<?php

namespace App\Http\Middleware;

use Closure;

class SignatureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $header = 'X-Name')
    {
        $respuesta = $next($request);
        $respuesta->headers->set($header,config('app.name'));
        return $respuesta;
    }
}
