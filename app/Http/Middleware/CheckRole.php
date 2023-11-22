<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
{
    $user = Auth::user();

    foreach ($roles as $role) {
        if (strtolower($user->hasRole($role))) {
            return $next($request);
        }
    }
    dd("User roles: " . $user->role->role, "Roles expected: " . implode(', ', $roles));
    abort(403, 'Unauthorized action.');
}


}