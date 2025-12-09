<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
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
            // неавторизованные — редирект на login
            return redirect()->route('login');
        }

        // если использован Spatie (метод hasRole), используем его, иначе проверяем поле role в таблице users
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
