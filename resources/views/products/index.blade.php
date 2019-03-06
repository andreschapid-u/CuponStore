@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="title">Listado de Productos</h3>
    <a name="" id="" class="btn btn-primary" href="{{route('products.create')}}" role="button">Registrar Producto</a>

    <div class="table-responsive">
        <div class="col-sm-12 ">
            <table class="table datatable table-striped table-bordered table-hover table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>CATEGORIA</th>
                        <th>MARCA</th>
                        <th>IMAGEN</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')@parent
<script>
    //Configuracion de datatables
            $(document).ready(function(urlAjax, columnas) {
                $('.datatable').dataTable( {
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    "language": {
                        "url": "Spanish.json"
                    },
                    "serverSide" : true,
                        "ajax" : "{{route('api.products')}}" ,
                        "columns": [
                        {data: "id"},
                        {data: "name"},
                        {data: "category"},
                        {data: "brand"},
                        {data: "image"},
                        {data: "options"}
                    ]
                } );

            } );

</script>
@endsection