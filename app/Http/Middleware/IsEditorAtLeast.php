<?php

namespace App\Http\Middleware;

use Closure;
use \Helpers\CheckUser;

class IsEditorAtLeast
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
        if ($request->user() && ($request->user()->hasRole('editor') || $request->user()->hasRole('admin') || $request->user()->hasRole('super_admin'))) {
            return $next($request);
        }
        return redirect('/');
    }
}
