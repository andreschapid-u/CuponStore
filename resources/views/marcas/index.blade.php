@extends('layouts.app')
@section('content')
<div class="container">
    <h3>MARCAS</h3>

    <div class="row">
        <div class="col-4">

            <form action="{{route('marcas.store')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="card ">
                    <div class="card-header bg-primary text-white">
                        Registrar Marcas
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input required type="text" class="form-control" name="name" id="name" placeholder="Nombre de la marca...">
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="offset-1 col-6 ">
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
@endsection

@section('scripts') @parent


<script>
    //Configuracion de datatables
        $(document).ready(function(urlAjax, columnas) {
            $('.datatable').dataTable( {
                "language": {
                    "url": "Spanish.json"
                },
                "serverSide" : true,
                    "ajax" : "api/marcas" ,
                    "columns": [
                    {data: "id"},
                    {data: "name"},
                    {data: "options"},
                ]
            } );
        } );

</script>
@endsection