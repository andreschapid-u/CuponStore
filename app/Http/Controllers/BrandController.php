<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Session;
use Validator;

class BrandController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brands.index');
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
            'name' => 'required|unique:brands,name'
        ]);

        if (!$validate->fails()) {
            Brand::create($request->all());
            Session::flash('success', "Se ha guaradado correctamente.");
            return  redirect()->route('brands');
        } else {
            Session::flash('error', "No se pudo guardar la marca.");
            // return redirect('marcas.index');
            return back()->withErrors($validate);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, $id)
    {
        $b = Brand::findOrFail($id);
        return view('brands.edit')->with('brand', $b);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, $id)
    {
        $b = Brand::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:brands,name'
        ]);

        if ($validate->fails()) {
            Session::flash('error', "No se pudo actualizar la marca.");
            // return redirect('marcas.index');
            return back()->withErrors($validate);
        } else {
            $b->name = $request['name'];
            $b->update();
            Session::flash('success', "Se ha guaradado correctamente.");
            return  view('brands.index');
        }

        $b->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
