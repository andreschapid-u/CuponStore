@extends('layouts.app')
@section('content')
<div class="container">



    <h3>MARCAS</h3>
    <p class="form-text text-muted">
        <button class="btn">
        {{-- Total marcas <span class="badge badge-primary">{{ $marcas->count()}}</span> --}}
        </button>
    </p>

    <form action="{{route('marcas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la marca...">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <table class="table datatable table-striped table-bordered">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
        </thead>

    </table>

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
]
            } );
        } );

</script>
@endsection
