<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'super_admin') {
            abort(403, 'Akses ditolak. Halaman ini khusus Super Admin.');
        }

        return $next($request);
    }
}