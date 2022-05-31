<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function viewItems(){
        $items = Item::all();
        return view('Item.view_items',['items'=>$items]);
    }

    public function edit($id){
        $item = Item::findOrFail($id);
        return view('Item.edit_item',['item'=>$item]);
    }

    public function update(Request $request , $id){
        $item = Item::findOrFail($id);
        if($request->file('image')){
            // delete old picture
            if(File::exists(public_path('public/Image/'.$item->image)))
                File::delete(public_path('public/Image/'.$item->image));
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $item->update([
                'name' => $request->name_ar,
                'name_en' => $request->name_en,
                'price' => $request->price,
                'image' => $filename,
            ]);
        }
        else{  // No picture change
            $item->update([
                'name' => $request->name_ar,
                'name_en' => $request->name_en,
                'price' => $request->price,
            ]);
        }
        return back();
    }
}
