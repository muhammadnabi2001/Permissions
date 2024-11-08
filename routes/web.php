<?php

use App\Http\Controllers\KitobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\TalabaController;
use App\Http\Controllers\TelefonController;
use App\Http\Controllers\UniversitetController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'loginpage'])->name('loginpage');
Route::get('/register',[LoginController::class,'registerpage'])->name('registerpage');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register',[LoginController::class,'register'])->name('register');
Route::get('/admin',[LoginController::class,'admin'])->name('admin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::post('createpost',[PostController::class,'create'])->name('create');

Route::get('/users',[UserController::class,'users'])->name('users')->middleware(Check::class);
Route::get('/deleteuser/{id}',[UserController::class,'delete'])->name('deleteuser');
Route::post('/createuser',[UserController::class,'create'])->name('createuser');
Route::put('/updateuser/{id}',[UserController::class,'update'])->name('updateuser');

Route::get('talaba',[TalabaController::class,'talaba'])->name('talabe')->middleware(Check::class);
Route::post('createtalaba',[TalabaController::class,'create'])->name('createtalaba');

Route::get('kitob',[KitobController::class,'kitob'])->name('kitob')->middleware(Check::class);
Route::post('createkitob',[KitobController::class,'create'])->name('createkitob');

Route::get('telefon',[TelefonController::class,'telefon'])->name('telefon')->middleware(Check::class);
Route::post('createtelefon',[TelefonController::class,'create'])->name('createtelefon');

Route::get('universitet',[UniversitetController::class,'universitet'])->name('universitet')->middleware(Check::class);
Route::post('createuniversitet',[UniversitetController::class,'create'])->name('createuniversitet');

Route::get('roles',[RoleController::class,'index'])->name('roles')->middleware(Check::class);
Route::post('createrole',[RoleController::class,'create'])->name('createrole');
Route::put('updaterole/{id}',[RoleController::class,'update'])->name('updaterole');
Route::get('deleterole/{id}',[RoleController::class,'destroy'])->name('deleterole');
Route::get('isactive/{id}',[RoleController::class,'isactive'])->name('isactive');
Route::get('noactive/{id}',[RoleController::class,'noactive'])->name('noactive');

Route::get('permission',[PermissionController::class,'permission'])->name('permission')->middleware(Check::class);

