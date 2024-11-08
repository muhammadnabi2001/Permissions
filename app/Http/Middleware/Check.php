<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //dd(Auth::user()->role);
    //     $userRoles=Auth::user()->roles;
    //    //dd(Auth::user()->roles);
    //     if(Auth::check() && $userRoles->whereIn('name',$roles)->first())
    //     {
    //         //dd(123);
    //         return $next($request);
    //     }
    //     abort(403);

        $routname=$request->route()->getName();
        if(Auth::user()){
            if(Permission::where("key",$routname)->first())
            {
                $role=Auth::user()->roles->first();
                if($role->permissions()->where("key",$routname)->exists())
                {
                    //dd(123);
                    return $next($request);
                }else{
                    abort(403);
                }
            }
        }else{
            abort(403);
        }
    }
}
