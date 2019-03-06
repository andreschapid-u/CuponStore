@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="title">Usuarios</h3>
    <a name="" id="" class="btn btn-primary" href="{{route('companies.create')}}" role="button">Registrar Empresa</a>

    <div class="table-responsive">
        <div class="col-sm-12 ">
            <table class="table datatable table-striped table-bordered table-hover table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>NIT</th>
                        <th>EMPRESARIO</th>
                        <th>LOGO</th>
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
                        "url": "{{asset('Spanish.json')}}"
                    },
                    "serverSide" : true,
                        "ajax" : "{{route('api.companies')}}" ,
                        "columns": [
                        {data: "id"},
                        {data: "name"},
                        {data: "nit"},
                        {data: "businessman"},
                        {data: "logo"},
                        {data: "options"},
                    ]
                } );

            } );

</script>
@endsection