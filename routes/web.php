<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MultiPicController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $suppliers = DB::table('suppliers')->get();
    return view('home', compact('suppliers'));    //view('welcome')
});

Route::get('/about', function () {
    return view('about');
})->middleware('check');  // about?check=32

Route::get('/contact', [ContactController::class, 'index'])->name('con');


/*
|--------------------------------------------------------------------------
| /Admin All Routes
|--------------------------------------------------------------------------*/
//..............SLIDER......................
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

            //    ADMIN SECTION
/*
|--------------------------------------------------------------------------
| /Category Routes
|--------------------------------------------------------------------------*/
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/delete/category/{id}', [CategoryController::class, 'Delete']);

/*
|--------------------------------------------------------------------------
| /Subcategory Routes
|--------------------------------------------------------------------------*/
Route::get('/subcategory/all', [SubCategoryController::class, 'AllSubCat'])->name('all.subcategory');

Route::post('/subcategory/add', [SubCategoryController::class, 'AddSubCat'])->name('store.subcategory');

/*
|--------------------------------------------------------------------------
| /Products Routes
|--------------------------------------------------------------------------*/
Route::get('admin/product/all', [ProductController::class, 'index'])->name('all.product');


Route::get('admin/product/add', [ProductController::class, 'create'])->name('add.product');
Route::post('admin/product/add', [ProductController::class, 'store'])->name('store.product');

/*
|--------------------------------------------------------------------------
| /Suppliers Routes
|--------------------------------------------------------------------------*/
Route::get('/suppliers/all', [SupplierController::class, 'AllSuppliers'])->name('all.suppliers');

Route::post('/supplier/add', [SupplierController::class, 'AddSupplier'])->name('store.supplier');

Route::get('/supplier/edit/{id}', [SupplierController::class, 'Edit']);

Route::post('/supplier/update/{id}', [SupplierController::class, 'Update']);

Route::get('/supplier/delete/{id}', [SupplierController::class, 'Delete']);

/*
|--------------------------------------------------------------------------
| /Multi Image Routes
|--------------------------------------------------------------------------*/
Route::get('/multi/image', [MultiPicController::class, 'MultiPic'])->name('multi.image');

Route::post('/multi/add', [MultiPicController::class, 'AddImg'])->name('store.image');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------*/
Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

//..............ADMIN......................
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//..............USER.......................
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

   //$users = User::all();  //Read Users
    $users = DB::table('users')->get();//Query Builder

    return view('admin.index', compact('users'));
})->name('dashboard');

//Route::resource('tasks',\App\Http\Controllers\TaskController::class);

//---Переадресація з адмін------------------------------
Route::get('/user/logout', [SupplierController::class, 'Logout'])->name('user.logout');

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Change Password and user Profile Route
|--------------------------------------------------------------------------*/


/*
|--------------------------------------------------------------------------
| Email Verification
|--------------------------------------------------------------------------*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
