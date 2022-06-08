<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles) // принимает Request, требуемую страницу и роли, которые могут открыть эту страницу
    {
        foreach($roles as $role) { //проверка наличия любой роли у пользователя
            if($request->user()->hasRole($role)) // если есть то пропускает на страницу
                return $next($request);
        }
        abort(401, 'Доступ к данной странице ограничен.'); //иначе нет
    }
}
