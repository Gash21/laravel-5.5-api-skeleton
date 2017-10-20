<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

final class LogMiddleware
{

    public function handle($request, Closure $next)
    {

        Log::info("REQUEST : ", $request->all());
        $response = $next($request);

        return $response;
    }
}
