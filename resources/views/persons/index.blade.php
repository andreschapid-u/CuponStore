@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="title">Listado de Usuarios</h1>

    <a name="" id="" class="btn btn-primary" href="{{route('persons.create')}}" role="button">Registrar Usuario</a>
    <hr>
    <div class="table-responsive">
        <div class="col-sm-12 ">
            <table class="table datatable table-striped table-bordered table-hover table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>ROL</th>
                        <th>CORREO</th>
                        <th>CORREO ENVIÓ</th>
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
    //Configuración de datatables
        $(document).ready(function(urlAjax, columnas) {
            $('.datatable').dataTable( {
                "language": {
                    "url": "{{asset('Spanish.json')}}"
                },
                "serverSide" : true,
                    "ajax" : "{{route('persons.getPersonsAll')}}" ,
                    "columns": [
                    {data: "id"},
                    {data: "first_name"},
                    {data: "last_name"},
                    {data: "role.name"},
                    {data: "user.email"},
                    {data: "shipping_email"},
                    {data: "options",'orderable' : false},
                ]
            } );

        } );
</script>
@endsection
