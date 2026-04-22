<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track if:
        // 1. It's not a GET request
        // 2. It's an AJAX request
        // 3. It's an admin route (any route starting with 'admin')
        // 4. It's an auth route (login, register, logout, etc.)
        if ($request->isMethod('GET') && 
            !$request->ajax() && 
            !$request->is('admin*') && 
            !$request->is('login*') && 
            !$request->is('register*') &&
            !$request->is('auth*')) {
            
            $ip = $request->ip();
            $visitor = Visitor::where('ip_address', $ip)->first();
            
            if ($visitor) {
                // Throttle: Only increment if last visit was more than 1 minute ago
                // This prevents inflation from page refreshes but still allows testing
                if ($visitor->last_visit->diffInMinutes(now()) >= 1) {
                    $visitor->increment('hits');
                    $visitor->update(['last_visit' => now()]);
                }
            } else {
                Visitor::create([
                    'ip_address' => $ip,
                    'hits' => 1,
                    'last_visit' => now(),
                ]);
            }
        }

        return $next($request);
    }
}
