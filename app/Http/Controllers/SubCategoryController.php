<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    { //F: щоб коли вилогонився не вводив (/dashboard) і не вибивало помилку (L:048)
        $this->middleware('auth');  //зробить редірект на /login сторінку
    }

    public function AllSubCat(){
        $category = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->join('categories','subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get(); //* - All

        return view('admin.category.subcategory.index', compact('category', 'subcategories'));
    }

    public function AddSubCat(Request $request){
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => ['required',  'max:255'],
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name']=$request->subcategory_name;

        DB::table('subcategories')->insert($data);

    /*    $notification = array(
            'message' => 'Добавлено Нову Підкатегорію',
            'alert-type' => 'success'
        );*/

      /*  return Redirect()->back()->with ($notification);*/
        return Redirect()->back()->with('success','Добавлено Нову Підкатегорію!');
       /* return view('admin.category.subcategory.index');*/
    }
}
