<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Logger
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Continue processing the request
        $response = $next($request);

        // Log the response
        $request->user()->logs()->create([
            'ip' => $request->ip(),
            'url' => $request->url(),
            'method' => $request->method(),
            'request' => $request->input(),
            'response' => $response->getContent(),
        ]);

        return $response;
    }
}
