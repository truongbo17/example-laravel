<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $role_id = Auth::user()->role_id;
        // if ($role_id == 2) {
        //     return $next($request);
        // }
        // echo "Bạn không có quyền truy cập tính năng này ";
        // $allowRole = explode('|', $roles); //chuyển string -> mảng
        // if (in_array(Auth::user()->getStrType(), $allowRole)) {
        //     return $next($request);
        // }
        // echo "Khong co quyen truy cap";

         return $next($request);
    }
}
