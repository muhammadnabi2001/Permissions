<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        $users=User::orderBy('id','desc')->get();
        $roles=Role::all();
        return view('users',['users'=>$users,'roles'=>$roles]);
    }
    public function create(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:50|min:5|email|unique:users,email',
            'password' => 'required',
            'roles'=>'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->roles()->attach($request->roles);

        return redirect()->back()->with('success', 'Ro\'yxatdan o\'tish muvaffaqiyatli yakunlandi!');

    }
    public function update(Request $request,int $id)
    {
        //dd($request->roles);
        $user=User::findOrFail($id);
        //dd($request->roles);
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->roles()->sync($request->roles);  
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function delete(int $id)
    {
        //dd($id);
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');

    }
}
