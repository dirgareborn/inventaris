<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $admin)
    {
        if ($request->user()->isAdmin()) {
            return $next($request);
        } else {
            if ($request->ajax() || $request->wantsJson()) {
                return response(403, 'Forbidden');
            }

            return abort(403, 'Forbidden');
        }


    }
}
