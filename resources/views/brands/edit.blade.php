@extends('layouts.app')
@section('content')
<div class="container">
    <h3>MARCAS</h3>

    <div class="row">
        <div class="col-4">

            <form action="{{route('brands.update', $brand->id)}}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                        Editar Marca
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input required type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Nombre de la marca..."
                                value="{{$brand->name}}"> @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts') @parent
@endsection