<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage()
    {
        return view('login');
    }
    public function registerpage()
    {
        return view('register');
    }
    public function login(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            
                $posts=Post::orderBy('id','desc')->get();
                return view('admin',['posts'=>$posts]);
           
        }
        else
        {
            return redirect('/login');
        }
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:50|min:5|email|unique:users,email',
            'password1' => 'required',
            'password2' => 'required|same:password1'
        ]);

        $data['password'] = bcrypt($data['password1']);
        unset($data['password1'], $data['password2']);

        $user = User::create($data);
        Auth::login($user);

        return redirect('index')->with('success', 'Ro\'yxatdan o\'tish muvaffaqiyatli yakunlandi!');

    }
    public function admin()
    {
        $posts=Post::orderBy('id','desc')->get();
        return view('admin',['posts'=>$posts]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
