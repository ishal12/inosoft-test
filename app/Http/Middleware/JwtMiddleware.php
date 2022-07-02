<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseFormat;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return ResponseFormat::unauthorizedResponse(
                    "Token is invalid."
                );
            } elseif (
                $e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException
            ) {
                return ResponseFormat::unauthorizedResponse(
                    "Token is expired."
                );
            } else {
                return ResponseFormat::unauthorizedResponse(
                    "Authorization Token not found"
                );
            }
        }
        return $next($request);
    }
}
