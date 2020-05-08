<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        header("Access-Control-Allow-Origin: *");

        $headers = [

            /*
            |--------------------------------------------------------------------------
            | Laravel CORS Options
            |--------------------------------------------------------------------------
            |
            | The allowed_methods and allowed_headers options are case-insensitive.
            |
            | You don't need to provide both allowed_origins and allowed_origins_patterns.
            | If one of the strings passed matches, it is considered a valid origin.
            |
            | If array('*') is provided to allowed_methods, allowed_origins or allowed_headers
            | all methods / origins / headers are allowed.
            |
            */
        
            /*
             * You can enable CORS for 1 or multiple paths.
             * Example: ['api/*']
             */
            'paths' => [],
        
            /*
            * Matches the request method. `[*]` allows all methods.
            */
            'allowed_methods' => ['*'],
        
            /*
             * Matches the request origin. `[*]` allows all origins.
             */
            'allowed_origins' => ['*'],
        
            /*
             * Matches the request origin with, similar to `Request::is()`
             */
            'allowed_origins_patterns' => [],
        
            /*
             * Sets the Access-Control-Allow-Headers response header. `[*]` allows all headers.
             */
            'allowed_headers' => ['*'],
        
            /*
             * Sets the Access-Control-Expose-Headers response header.
             */
            'exposed_headers' => false,
        
            /*
             * Sets the Access-Control-Max-Age response header.
             */
            'max_age' => false,
        
            /*
             * Sets the Access-Control-Allow-Credentials header.
             */
            'supports_credentials' => false,
        ];
        // if($request->getMethod() == "OPTIONS") {

        // return response()->make('OK', 200, $headers);
        // }

        $response = $next($request);
        foreach($headers as $key => $value)
        $response->header($key, $value);
        return $response;
    }
}
