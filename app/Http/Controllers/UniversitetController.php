<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Universitet;
use Illuminate\Http\Request;

class UniversitetController extends Controller
{
    public function universitet()
    {
        $universitets=Universitet::orderBy('id','desc')->get();
        return view('universitet',['universitets'=>$universitets]);
    }
    public function create(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'adress' => 'required|max:50',
            'facultet' => 'required',
        ]);

        $universitet= new Universitet();
        $universitet->name = $request->name;
        $universitet->adress = $request->adress;
        $universitet->facultet = $request->facultet;
        $universitet->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }
}
