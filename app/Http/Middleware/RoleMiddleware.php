<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (method_exists($user, 'hasRole')) {
            if (! $user->hasRole($role)) {
                abort(403, 'Access denied.');
            }
        } else {
            $userRole = $user->role ?? null;
            if ($userRole !== $role) {
                abort(403, 'Access denied.');
            }
        }

        return $next($request);
    }
}
