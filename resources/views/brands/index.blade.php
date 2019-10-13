@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 mx-auto">
            <h3>Marcas</h3>
        </div>

        <div class="col-sm-12 col-md-4">

            <form action="{{route('brands.store')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                        Registrar Marcas
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input required type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Nombre de la marca..."
                                value="{{ old('name')}}"> @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="col center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="table-responsive">
                <div class="col-sm-12 ">
                    <table class="table datatable table-striped table-bordered table-hover table-sm">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    //Configuración de datatables
        $(document).ready(function(urlAjax, columnas) {
            $('.datatable').dataTable( {
                "language": {
                    "url": "{{asset('Spanish.json')}}"
                },
                "serverSide" : true,
                    "ajax" : "api/marcas" ,
                    "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "options", 'orderable' : false},
                ]
            } );

            $('label').addClass('form-inline');
			$('select, input[type="search"]').addClass('form-control input-sm');
        } );
</script>
@endsection
{{-- @include('brands.partials.modal') --}}