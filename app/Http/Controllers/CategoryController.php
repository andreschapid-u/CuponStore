<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;
use Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name'
        ]);


        // $request->validate([
        //     'name' => 'required|unique:brands,name'
        // ]);

        if (!$validate->fails()) {
            Category::create($request->all());
            Session::flash('success', "Se ha guaradado correctamente.");
            return  redirect('categorias');
        } else {
            Session::flash('error', "No se pudo guardar la categoria.");
            // return redirect('marcas.index');
            return back()->withErrors($validate);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $c = Category::findOrFail($id);
        return view('categories.edit')->with('category', $c);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $c = Category::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name'
        ]);

        if ($validate->fails()) {
            Session::flash('error', "No se pudo actualizar la categoria.");
            return back()->withErrors($validate);
        } else {
            $c->name = $request['name'];
            $c->update();
            Session::flash('success', "Se ha guaradado correctamente.");
            return  redirect('categorias');

            // return  redirect('categorias');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
