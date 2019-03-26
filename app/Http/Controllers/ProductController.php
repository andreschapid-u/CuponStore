<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("products.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create')
        ->with('categories',Category::all())
        ->with('brands',Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        if ($request->file('imagen')) {
            $image_s = Storage::disk('imagenes')->put('/images/productos',$request->file('imagen'));
            $p = new Product();
            $p->name = $request["nombre"];
            $p->description = $request["descripcion"];
            // $p->image = asset($image_s);
            $p->image = $image_s;
            $p->brand_id = $request["marca"];
            $p->category_id =  $request["categoria"];
            // dd($c);
            $p->save();
            Session::flash("success", "Se ha registrado el producto!");
            return redirect()->route("products.index");
        }
        Session::flash("error", "NO se pudo registrar el producto!");
        return redirect()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        $product = $producto;
        // dd($producto->name);
        // return view('products.show')->with("product", Product::findOrFail($id));
        return view('products.show', compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
