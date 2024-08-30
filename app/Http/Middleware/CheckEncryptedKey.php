<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEncryptedKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $encryptedKey = $request->post('encryption_key');
        if (isset($encryptedKey)) {
            if ($encryptedKey != config('secrets.api_encryption_key')) {
                return response()->json(['message' => 'Invalid Key'], 403);
            }
        } else {
            return response()->json(['message' => 'Bad Request'], 400);
        }

        return $next($request);
    }
}
