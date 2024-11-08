<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Telefon;
use Illuminate\Http\Request;

class TelefonController extends Controller
{
    public function telefon()
    {
        $telefonlar=Telefon::orderBy('id','desc')->get();
        return view('telefon',['telefonlar'=>$telefonlar]);
    }
    public function create(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'model' => 'required|max:25',
            'color' => 'required|max:50',
            'price' => 'required',
            'count' => 'required',
        ]);

        $telefon= new Telefon();
        $telefon->model = $request->model;
        $telefon->color = $request->color;
        $telefon->price = $request->price;
        $telefon->count = $request->count;
        $telefon->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }
}
