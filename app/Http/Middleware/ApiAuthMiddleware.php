<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $settings = Setting::getSettingByKey('api_auth_key');
            $expectedAuthKey = $settings ? $settings : null;
            $authKey = $request->header('Authorization');
            if ($authKey !== $expectedAuthKey) {
                return response()->json([
                    'error' => [
                        'code' => 'ERR_AUTH_INVALID',
                        'message' => 'Your request could not be authorized. Please check your authorization key.',
                        'suggestion' => 'Make sure you have provided the correct authorization key in the request headers.',
                        'status' => 401
                    ]
                ], 401);
            }
            return $next($request);
        } catch (Exception $e) {
            Log::error('ApiAuthMiddleware: ' . $e->getMessage());
        }
    }
}
