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
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        // Проверяем, что пользователь авторизован.
        if (!$user) {
            return redirect('/login'); // или `abort(403)` если вы предпочитаете сразу запрещать доступ
        }

        // Перебираем список ролей, переданных в middleware, и проверяем, имеет ли пользователь хотя бы одну из них.
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request); // Пользователь имеет требуемую роль, продолжаем запрос
            }
        }

        // Если у пользователя нет ни одной из требуемых ролей, возвращаем ошибку 403.
        return abort(403);
    }
}