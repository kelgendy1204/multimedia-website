<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->checkRole('super_admin')) {
            return $next($request);
        } elseif ($request->user()->checkRole('admin')) {
            return redirect('/mzk_admin_panel');
        }
        return redirect('/');
    }
}