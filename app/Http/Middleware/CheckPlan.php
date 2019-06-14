<?php

namespace App\Http\Middleware;

use Closure;

class CheckPlan
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
        if(!auth()->guard('candidate')->check())
            return redirect('/');

        $status = auth()->guard('candidate')->user()->transaction->status;
        if ($status != 'ACTIVE') {
            return redirect('/');
        }
        return $next($request);
    }
}
