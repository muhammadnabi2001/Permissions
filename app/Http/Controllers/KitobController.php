<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kitob;
use Illuminate\Http\Request;

class KitobController extends Controller
{
    public function kitob()
    {
        $kitoblar=Kitob::orderBy('id','desc')->get();
        return view('kitob',['kitoblar'=>$kitoblar]);
    }
    public function create(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'author' => 'required|max:50',
            'price' => 'required',
        ]);
        $kitob = Kitob::create($data);

        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");

    }
}
