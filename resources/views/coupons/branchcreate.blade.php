@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Registra Sucursal</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="mx-auto">Empresa: <strong>{{$company->name}}</strong></h3>
                <div class="card-body">
                    <form action="{{route('companies.store_branch', $company->id)}}" method="post" class="needs-validation" novalidate>
                        @csrf @method('post')

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Dicección</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion"
                                    value="{{ old('direccion') }}" required autofocus> @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
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