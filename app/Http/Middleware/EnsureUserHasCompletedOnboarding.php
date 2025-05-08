<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasCompletedOnboarding
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && !$user->onboarded_at) {
            return redirect()->route('onboarding.index');
        }

        return $next($request);
    }
}
