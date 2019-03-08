@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Registro de un Producto</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nuevo Producto</h4>
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf @method('post')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}"
                                    required autofocus> @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion"
                                    value="{{ old('descripcion') }}" autofocus> @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categorías</label>
                            <div class="col-md-6">
                                <select required class="form-control " name="categoria" id="categoria">
                                    <option value="" selected>Seleccione uno....</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">Marcas</label>
                            <div class="col-md-6">
                                <select required class="form-control " name="marca" id="marca">
                                    <option value="" selected>Seleccione uno....</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-6">
                                <input id="imagen" type="file" accept="image/jpg, image/png, image/jpeg" class="form-control-file form-control {{ $errors->has('imagen') ? ' is-invalid' : '' }}"
                                    name="imagen" required autofocus aria-describedby="01"> @if($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('imagen') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection