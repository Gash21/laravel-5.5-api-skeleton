<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

/**
 * Log Middleware
 * Automatically insert log for request
 *  
 * @version 1.0.0 Original Version
 * @author Galih Arghubi <galiharghubi@gmail.com>
 * @copyright 2017 Galih Arghubi
 */
final class LogMiddleware
{

    public function handle($request, Closure $next)
    {
        Log::info("REQUEST : ", $request->all());
        $response = $next($request);

        return $response;
    }
}
