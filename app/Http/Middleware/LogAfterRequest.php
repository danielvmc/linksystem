<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;
use Route;

class LogAfterRequest
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
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $ip = request()->ip();

        if (!auth()->check()) {
            Client::create([
                'ip' => $ip,
                'user_agent' => request()->header('User-Agent'),
                'url' => Route::current()->uri,
                'status' => 'allowed',
            ]);
        }
    }
}
