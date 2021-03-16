<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;


class SupplierController extends Controller
{
    public function __construct()
    { //F: щоб коли вилогонився не вводив (/dashboard) і не вибивало помилку (L:048)
        $this->middleware('auth');  //зробить редірект на /login сторінку
    }

    public function AllSuppliers(){
        $suppliers = Supplier::latest()->paginate(5);

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function AddSupplier(Request $request){

        $validatedData = $request->validate([       // https://laravel.com/docs/8.x/validation#introduction
            'supplier_name' => ['required', 'unique:suppliers', 'min:3'], //'required|unique:categories|min:4',
            'supplier_image' => ['required', 'mimes:jpg, jpeg, png'], //'required|mimes:jpg.jpeg,png',
        ],
            [
                'supplier_name.required' => 'Введіть Імя Постачальника',
                'supplier_name.min' => 'Введене Імя Постачальника має бути не меньше чим 3 символи',
            ]);

        $supplierImage = $request->file('supplier_image');  //index.blade->type="file" name="supplier_image"

        //----замінемо цен нижче пакетом-----------------------------
//        $name_gen = hexdec(uniqid());//унікальна назва завантажуваного фото
//        $img_ext = strtolower($supplierImage->getClientOriginalExtension()); //strtolower(Преобразует строку в нижний регистр) getClientOriginalExtension (возвращает расширение файла, которое передал пользователь в названии файла)
//        $img_name = $name_gen.'.'.$img_ext; //  - 2323.jpg
//        $up_location = 'image/suppliers/'; //місце куди запишутся фото
//        $last_img = $up_location.$img_name; // **1**
//        $supplierImage->move($up_location, $img_name);

        //------package intervention image---------------------------
        $name_gen = hexdec(uniqid()).'.'.$supplierImage->getClientOriginalExtension();
        Image::make($supplierImage)->resize(400,140)->save('image/suppliers/'.$name_gen);
        $last_img = 'image/suppliers/'. $name_gen;


            Supplier::insert([
            'supplier_name' => $request->supplier_name,
            'supplier_image' => $last_img,  // **1**
            'created_at' => Carbon::now()  // незабути зверху use Illuminate\Support\Carbon;
        ]);
            return Redirect()->back()->with('success', 'Добавлено Нового Постачальника');
    }

    public function Edit($id){
        $suppliers = Supplier::find($id);

        return view('admin.suppliers.edit', compact('suppliers'));
    }

    public function Update(Request $request, $id){
        $validatedData = $request->validate([       // https://laravel.com/docs/8.x/validation#introduction
            'supplier_name' => ['required', 'min:3'],
        ],
            [
                'supplier_name.required' => 'Введіть Імя Постачальника',
                'supplier_name.min' => 'Введене Імя Постачальника має бути не меньше чим 3 символи',
            ]);

        $old_image = $request->old_image;   // L:040

        $supplierImage = $request->file('supplier_image');  //index.blade->type="file" name="supplier_image"

        //F: Якщо ми поміняєм тільки картинку або тільк текст вибє помилку!!! Робимо через if L:40
        if($supplierImage) {                                      //Відносится до  імені та картинки постачальника
            $name_gen = hexdec(uniqid());//унікальна назва завантажуваного фото
            $img_ext = strtolower($supplierImage->getClientOriginalExtension()); //strtolower(Преобразует строку в нижний регистр) getClientOriginalExtension (возвращает расширение файла, которое передал пользователь в названии файла)
            $img_name = $name_gen.'.'.$img_ext; //  - 2323.jpg
            $up_location = 'image/suppliers/'; //місце куди запишутся фото
            $last_img = $up_location.$img_name; // **1**
            $supplierImage->move($up_location, $img_name);

            unlink($old_image);  // L:040

            Supplier::find($id)->update([                  //Відносится до імені та картинки постачальника
                'supplier_name' => $request->supplier_name,
                'supplier_image' => $last_img,  // **1**
                'created_at' => Carbon::now()  // незабути зверху use Illuminate\Support\Carbon;
            ]);
            return Redirect()->back()->with('success', 'Постачальника Оновлено');

        }else{                                   //Відносится тільки до імені постачальника
            Supplier::find($id)->update([
                'supplier_name' => $request->supplier_name,
                'created_at' => Carbon::now()  // незабути зверху use Illuminate\Support\Carbon;
            ]);
            return Redirect()->back()->with('success', 'Постачальника Оновлено');
        }
    }

    public function Delete($id){
        $image = Supplier::find($id);      //видалення картинкі фізично з сервера
        $old_image = $image->supplier_image;
        unlink($old_image);

        Supplier::find($id)->delete();
        return Redirect()->back()->with('success', 'Постачальника Видалено!');
    }


    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'Юзер Вилогінився!');
    }
}
