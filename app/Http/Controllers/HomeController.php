<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function AddSlider(){
        return view ('admin.slider.create');
    }
    public function StoreSlider(Request $request){
        $slider_Image = $request->file('image');  //index.blade->type="file" name="image"


        //------package intervention image---------------------------
        $name_gen = hexdec(uniqid()).'.'.$slider_Image->getClientOriginalExtension();
        Image::make($slider_Image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'. $name_gen;


        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,  // **1**
            'created_at' => Carbon::now()  // незабути зверху use Illuminate\Support\Carbon;
        ]);
        return Redirect()->route('home.slider')->with('success', 'Добавлено Новий Слайдер');
    }
    public function DeleteSlider($id){
        $image = Slider::find($id);      //видалення картинкі фізично з сервера
//        $old_image = $image->slider_Image;
//        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->back()->with('success', 'Слайдер Видалено!');
    }

}
