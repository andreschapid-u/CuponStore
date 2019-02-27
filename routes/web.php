<?php
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/d/{dep}', function ($dep)
{

    $dep = \App\Department::where('name',$dep)->firstOrFail();
    // dd($dep->cities());
    foreach ($dep->cities as $c) {
        echo $c->name . '<br>';
    }
});
