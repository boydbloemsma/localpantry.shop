<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->getPreferredLanguage(['nl', 'en']);

        App::setLocale(in_array($locale, ['nl', 'en']) ? $locale : 'en');

        return $next($request);
    }
}
