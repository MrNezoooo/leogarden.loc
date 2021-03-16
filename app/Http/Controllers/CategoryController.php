<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    { //F: щоб коли вилогонився не вводив (/dashboard) і не вибивало помилку (L:048)
        $this->middleware('auth');  //зробить редірект на /login сторінку
    }

    public function AllCat(){
        $categories = Category::latest()->paginate(30);  //>get();                //  I спосіб
        $trashCat = Category::onlyTrashed()->latest()->paginate(3); // DELETE (SoftDeletes) **1**

        //$categories=DB::table('categories')->latest()->paginate(5); //  II спосіб(a) (з допомогою query bilder)

        //  II спосіб(b) (з допомогою query bilder) реалізовано підстановку з іншої таблички поля
       // $categories = DB::table('categories') -> join('users', 'categories.user_id', 'users.id')->select('categories.*','users.name')->latest()->paginate(5);


        return view('admin.category.index', compact('categories','trashCat'));
    }

    public function AddCat(Request $request){

            $validatedData = $request->validate([       // https://laravel.com/docs/8.x/validation#introduction
                'category_name' => ['required', 'unique:categories', 'max:255'],
                //$trashCat = Category::onlyTrashed()-latest()->paginate(3);

            ],
            [
                'category_name.required' => 'Будь ласка введіть Імя Категорії',
                'category_name.max' => 'ВведенеІмя Категорії меньше чим 255 символів',
            ]);

//            Category::insert([                                   //  I спосіб
//                'category_name' => $request->category_name,
//                'user_id' => Auth::user()->id,
//                'created_at' => Carbon::now()
//            ]);

//            $category = new Category();                          //  II спосіб
//            $category->category_name = $request->category_name;
//            $category->user_id = Auth::user()->id;
//            $category->save();

        $data = array();                                  //  III спосіб (з допомогою query bilder) https://laravel.com/docs/8.x/queries
        $data['category_name'] = $request->category_name;  // <input name
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);


            return Redirect()->back()->with('success','Добавлено Нову Категорію!');
            //return view('admin.category.index');
    }

    public function Edit($id){
        $categories = Category::find($id);        //  I спосіб
        // $categories = DB::table('categories')->where('id', $id)->first();  //  II спосіб (з допомогою query bilder)
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        $update = Category::find($id)->update([           //  I спосіб
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

//        $data = arrey();                                    //  II спосіб (з допомогою query bilder)
//        $data = ['category_name'] = $request->category_name;
//        $data['user_id'] = Auth::user()->id;
//        DB::table('categories')->where('id', $id)->update($data);

        return Redirect()->route('all.category')->with('success','Оновлено Категорію!');
    }

    public function SoftDelete($id){ // **1** вище початок в AllCat()
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Вибрану Категорію Видалено в Смітник!');
    }

    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
            return Redirect()->back()->with('success', 'Вибрану Категорію Відновлено!');
    }

    public function Delete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Вибрану Категорію Видалено Остаточно!');
    }
}
