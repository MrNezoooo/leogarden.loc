<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Multipic;
use Image;
use Auth;

class MultiPicController extends Controller
{
    public function MultiPic(){
        $images = Multipic::all();
        return view ('admin.multipic.index', compact('images'));
    }

    public function AddImg(Request $request){
        $image = $request->file('image');  //index.blade->type="file" name="image"

        foreach($image as $multi_img){

            //------package intervention image---------------------------
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);
            $last_img = 'image/multi/'. $name_gen;

            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()  // незабути зверху use Illuminate\Support\Carbon;
            ]);
        }  //end of the foreach

        return Redirect()->back()->with('success', 'Добавлено Нові Фото');
    }
}
