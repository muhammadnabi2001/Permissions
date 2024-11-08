<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('role',['roles'=>$roles,'permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:25',
        ]);

        $role = Role::create($data);
        $role->permissions()->attach($request->permissions);
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role,int $id)
    {
        //dd($id);
        $role=Role::findOrFail($id);
        $role->name=$request->name;
        $role->permissions()->sync($request->permissions);
        $role->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli yangilandi");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role,int $id)
    {
        //dd($id);
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli o'chirildi");
        
    }
    public function isactive(int $id)
    {
        $role=Role::findOrFail($id);
        //dd($role);
        $role->is_active=0;
        $role->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli yangilandi");
    }
    public function noactive(int $id)
    {
        $role=Role::findOrFail($id);
        //dd($role);
        $role->is_active=1;
        $role->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli yangilandi");
    }
}
