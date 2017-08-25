<?php

namespace App\Http\Middleware;

use Closure;
use \Helpers\CheckUser;

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
        CheckUser::CheckUserName($request);
        if ($request->user() && $request->user()->hasRole('super_admin')) {
            return $next($request);
        } elseif ($request->user() && ($request->user()->hasRole('admin') || $request->user()->hasRole('editor'))) {
            return redirect('/admin/mzk_admin_panel');
        }
        return redirect('/');
    }
}
