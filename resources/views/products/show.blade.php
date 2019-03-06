@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Ver Producto</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <h4><strong>{{ $product->name}}</strong></h4>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nit" class="col-md-4 col-form-label text-md-right">Descripción</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->description}}</strong></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">Imagen</label>
                        <div class="col-md-6">
                        <img clas="img-fluid" src="{{asset($product->image)}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="person_id" class="col-md-4 col-form-label text-md-right">Categoria</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->category->name}}</strong></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="person_id" class="col-md-4 col-form-label text-md-right">Marca</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->brand->name}}</strong></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mx-auto">
                        <a name="" id="" class="btn btn-primary" href="{{route('products.index')}}" role="button">Atras</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection