<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('marcas', function(){
    return datatables()
    ->eloquent(\App\Brand::query())
    ->addColumn('options', 'brands.partials.actions')
    ->rawColumns(['options'])
    ->toJson();
});

Route::get('categorias', function(){
    return datatables()
    ->eloquent(\App\Category::query())
    ->addColumn('options', 'categories.partials.actions')
    ->rawColumns(['options'])
    ->toJson();
});


Route::get('marcas/get/{id}', function($id){
    return response(\App\Brand::find($id));
});

Route::get('companies',function(){
    return datatables()
    // ->eloquent(\App\Company::query())
    ->eloquent(\App\Company::with("boss")->select("companies.*"))
    ->addColumn('businessman', function ($model) {
        return $model->boss->getFullName();
    })
    ->addColumn('logo', 'companies.partials.image_s')
    ->addColumn('options', 'companies.partials.actions')
    ->rawColumns(['logo', 'options'])
    ->toJson();
})->name("api.companies");

Route::get('cities/{dep}', function ($dep) {
    $response = \App\Department::find($dep)->cities ?:null;
    return response($response);
})->name('cities.department');


Route::get('products',function(){
    return datatables()
    ->eloquent(\App\Product::query())
    ->addColumn('category', function ($model) {
        return $model->category->name;
    })
    ->addColumn('brand', function ($model) {
        return $model->brand->name;
    })
    ->addColumn('image', 'products.partials.image_s')
    ->addColumn('options', 'products.partials.actions')
    ->rawColumns(['image','options'])
    ->toJson();
})->name("api.products");

Route::get('empresas/{id}/sucursales',function($id){
    return datatables()
    ->eloquent(\App\Branch::where("company_id", $id))
    ->addColumn('department', function ($model) {
        return $model->city->department->name;
    })
    ->addColumn('city', function ($model) {
        return $model->city->name;
    })
    ->toJson();
})->name("api.companies.branches");


Route::get('productos/{id}/cupones',function($id){
    return datatables()
    ->eloquent(\App\Coupon::where("product_id", $id))
    ->addColumn('company', function ($model) {
        return $model->company->name;
    })
    ->addColumn('status', function ($model) {
        return $model->status();
    })
    ->toJson();
})->name("api.products.coupons");