<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission()
    {
        $permission=Permission::all();
        return view('permission',['permissions'=>$permission]);

    }
}
