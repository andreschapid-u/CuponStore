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
    ->eloquent(\App\Company::query())
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
