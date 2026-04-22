<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GzipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (app()->environment('local') && !$request->has('debug_gzip')) {
            // Optional: Skip in local if you want to see raw output, 
            // but for "feel" testing we can keep it.
        }

        // Check if browser supports gzip and if zlib is enabled
        if (str_contains($request->header('Accept-Encoding', ''), 'gzip') && function_exists('gzencode') && !ini_get('zlib.output_compression')) {
            $content = $response->getContent();
            $compressedContent = gzencode($content, 9);

            $response->setContent($compressedContent);
            $response->headers->set('Content-Encoding', 'gzip');
            $response->headers->set('Content-Length', strlen($compressedContent));
        }

        return $response;
    }
}
