<?php

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Request;
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
    return view('welcome')->with("coupons", \App\Coupon::orderBy("expiration", "ASC")->get());
});
Route::get('/prueba', function () {
    return view('prueba');
});


Route::get('/empresa', function () {
    return view('empresa');
});
Route::post('/empresa', function (Request $r) {
    // dd($r["codigoCoupon"]);
    $venta = \App\Purchase::where("coupon_code",$r["codigoCoupon"])->first();
    if($venta){
        return view('empresa')->with("coupon", $venta->coupon);
    }
    session()->flash("error", "No esta disponible");
    return view('empresa');
})->name("empresa");

Route::get('/administrador', function () {
    return view('administrador');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/d/{dep}', function ($dep) {

    $dep = \App\Department::where('name', $dep)->firstOrFail();
    // dd($dep->cities());
    foreach ($dep->cities as $c) {
        echo $c->name . '<br>';
    }
});

Route::group(['prefix' => 'marcas'], function () {
    Route::get('/', 'BrandController@index')->name('brands');
    Route::get('{id}/actualizar', 'BrandController@edit')->name('brands.edit');

    Route::post('registrar', 'BrandController@store')->name('brands.store');
    Route::post('actualizar', 'BrandController@update')->name('brands.update');
});
Route::group(['prefix' => 'categorias'], function () {
    Route::get('/', 'CategoryController@index')->name('categorias');
    Route::post('store', 'CategoryController@store')->name('categorias.store');
    Route::get('{id}/edit', 'CategoryController@edit')->name('categorias.edit');
    Route::post('update/{id}', 'CategoryController@update')->name('categorias.update');
});
Route::group(['prefix' => 'personas'], function () {
    Route::get('/', 'PersonController@index')->name('persons');
    Route::get('registrar', 'PersonController@create')->name('persons.create');
    Route::get('getPersonsAll', 'PersonController@getPersonsAll')->name('persons.getPersonsAll');
    // Route::get('{id}/actualizar', 'PersonController@edit')->name('persons.edit');
    // Route::get('ver/{id}', 'PersonController@show')->name('persons.show');

    Route::post('guardar', 'PersonController@store')->name('persons.store');
    // Route::post('acrualizar/{id}', 'PersonController@update')->name('persons.update');
});

// Route::resource('marcas', 'BrandController')->except(['create', 'shwo', 'destroy']);
Route::resource('empresas', 'CompanyController', ['names' => 'companies'])->except(['update', 'destroy', 'edit']);

Route::group(['prefix' => 'empresas/{id}/sucursales'], function ($id) {
    Route::get('crear', 'CompanyController@create_branch')->name('companies.create_branch');
    Route::post('crear', 'CompanyController@store_branch')->name('companies.store_branch');
});
Route::resource('productos', 'ProductController', ['names' => 'products'])->except(['update', 'destroy', 'edit']);

Route::group(['prefix' => 'productos/{id}/cupones'], function ($id) {
    Route::get('crear', 'CouponController@create')->name('coupons.create');
    Route::post('crear', 'CouponController@store')->name('coupons.store');
});

Route::get('/get/sucursales/{company}', function (\App\Company $company) {
    return view("products.partials.branchesul")->with("branches", $company->branches);
});


Route::post("eje", function () {
    return back();
})->middleware("auth");

Route::group(['prefix' => 'carrito'], function () {

    // Route::resource('cart', 'CartController')->only(["store","update","show", "destroy","index"]);
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::post('agregar/{coupon}', 'CartController@store')->name('cart.store');
    Route::post('actualizar/{coupon}', 'CartController@update')->name('cart.update');
    Route::post('eliminar/{coupon}', 'CartController@destroy')->name('cart.destroy');
});

