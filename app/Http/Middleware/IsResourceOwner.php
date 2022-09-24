<?php

namespace App\Http\Middleware;

use App\Models\RailCar;
use Closure;
use Illuminate\Http\Request;

class IsResourceOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $railCar = RailCar::find($request->route()->parameter('railcar'));
        if(!empty($railCar) && $railCar->user_id != auth()->user()->id )
        {
            return abort(403);
        }
        return $next($request);
    }
}
