<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user(); 
        // dd($user);
        // dd($user->role);
        // dd($user->role->name);
        if (!$user || !$user->role || $user->role->name !== $role) {
            abort(403, 'Accès non autorisé.');
        }

        return $next($request);
    }
}
