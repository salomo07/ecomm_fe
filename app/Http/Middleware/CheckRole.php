<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $requiredRole)
    {
        // Ambil role dari cookies
        $role = $request->cookie('role');
        $allowedRoles = explode(',', $requiredRole);

        if (!in_array($role, $allowedRoles)) {
            // return abort(403, 'Unauthorized');
            return redirect('/unauthorized')->with(403, 'Unauthorized');
        }
        // Jika cookie tidak ada
        if (!$role) {
            return redirect('/login')->with('error', 'Please login first');
        }

        // Cek apakah role sesuai
        if ((int)$role !== (int)$requiredRole) {
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
