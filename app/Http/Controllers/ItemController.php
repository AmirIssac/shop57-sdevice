<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function add(){
        return view('Item.add_item');
    }

    public function store(Request $request){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);
        Item::create([
            'name' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'image' => $filename,
        ]);
        return back();
    }
}
