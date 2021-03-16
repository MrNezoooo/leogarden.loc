<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    { //F: щоб коли вилогонився не вводив (/dashboard) і не вибивало помилку (L:048)
        $this->middleware('auth');  //зробить редірект на /login сторінку
    }

     public function index(){
        $products = Product::get();
         //dd ($products);

        return view ('admin.product.show', compact('products'));
     }

    public function create(){
      //echo "Hello TEST Category";
        /*
               $validatedData = $request->validate([       // https://laravel.com/docs/8.x/validation#introduction
                   'product_name' => ['required', 'unique:categories', 'max:255'],
                   //$trashCat = Category::onlyTrashed()-latest()->paginate(3);

               ],
                   [
                       'product_name.required' => 'Будь ласка введіть Імя Категорії',
                       'product_name.max' => 'ВведенеІмя Категорії меньше чим 255 символів',
                   ]);
*/
             /*  $data = array();                                  //  III спосіб (з допомогою query bilder) https://laravel.com/docs/8.x/queries
               $data['product_name'] = $request->category_name;  // <input name
                $data['category_id'] = Сategory::user()->id;
               DB::table('products')->insert($data);*/


        return view('admin.product.create');
    }

    public function store(Request $request){
        $data['product_name'] = $request->product_name;  // <input name
        $data['category_id'] = $request->category_id;
        /*$data['category_id'] => Сategory::category_name()->category_id;*/
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;

        DB::table('products')->insert($data);



        return redirect()->route('all.product');
    }
}
