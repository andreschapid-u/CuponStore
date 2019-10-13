@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
        <div class="row ">
                <h1 class="mx-auto">Registro de empresas</h1>
        </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nueva empresa</h4>
                    <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                            <label for="nit" class="col-md-4 col-form-label text-md-right">NIT</label>
                            <div class="col-md-6">
                                <input id="nit" type="number" class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" name="nit" value="{{ old('nit') }}"
                                    required autofocus> @if ($errors->has('nit'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nit') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="person_id" class="col-md-4 col-form-label text-md-right">Empresario</label>
                            <div class="col-md-6">

                                <select required class="form-control " name="person_id" id="person_id">
                                    <option value="" selected>Seleccione uno....</option>
                                    @foreach ($empresarios as $empresario)
                                    <option value="{{$empresario->id}}">{{$empresario->first_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>
                            <div class="col-md-6">
                                <input id="logo" type="file" accept="image/jpg, image/png, image/jpeg" class="form-control-file form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}"
                                    name="logo" required autofocus aria-describedby="01">
                                    @if($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="card-header">Sucursal</div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion"
                                    value="{{ old('direccion') }}" required autofocus> @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono"
                                    value="{{ old('telefono') }}" required autofocus> @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departamento" class="col-md-4 col-form-label text-md-right">Departamento</label>
                            <div class="col-md-6">

                                <select required class="form-control " name="departamento" id="departamento">
                                    <option value="" selected>Seleccione uno....</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">Ciudad</label>
                            <div class="col-md-6">
                                <select required class="form-control " name="ciudad" id="ciudad">
                                    <option value="" selected>Seleccione uno....</option>
                                </select>
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
@include('companies.partials.cities_search')
