<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            redirect()->route('login');

        $user = Auth::user();
        dd($user);
        // if ($user->isAdmin())
        return $next($request);
        // $path = $request->path();
        // if ($path != "login" && $path != "register") {
        //     dd(Auth::user());
        // }
        // return $next($request);
        // if ($path == "login" || $path == "register") {
        //     return $next($request);
        // } else if ($path != "login" || $path != "register") {
        //     dd($request);
        //     foreach ($roles as $role) {
        //         if ($request->user()->hasRole($role)) {
        //             return $next($request);
        //         }
        //     }
        // }
        // return $next($request);

        // foreach ($roles as $role) {
        //     // Check if user has the role This check will depend on how your roles are set up
        //     if ($user->hasRole($role))
        //         return $next($request);
        // }

        // return redirect('login');
    }
}
