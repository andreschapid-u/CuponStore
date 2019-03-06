@extends('layouts.app')
@section('content')
<div class="container">


    <div class="row">
        <div class="mx-auto col-lg-5 col-md-6 col-sm-12">

            <h3>CATEGORIA</h3>
            <form action="{{route('categorias.update', $category->id)}}" method="POST" class="needs-validation" novalidate>
                @csrf @method('post')
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                        Editar Categoria
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input required type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Nombre de la categoria..."
                                value="{{$category->name}}"> @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts') @parent
@endsection