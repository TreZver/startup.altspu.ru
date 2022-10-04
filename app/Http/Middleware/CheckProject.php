<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
class CheckProject
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
        $id = Auth::user()->id;
        $project = \App\Models\Project::where('user_id', $id)->first();
        
        if ( $project && $request->routeIs('user.new.*') ){
            return redirect()->route('user.index');
        }
        if ( !$project && !$request->routeIs('user.new.*') ){
            return redirect()->route('user.new.index');
        }

        if (!$project && !$request->routeIs('user.new.*')){
            return redirect()->route('user.new');
        }
        return $next($request);
    }
}
