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
                        <th>CORREO ENVIO</th>
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
                    "ajax" : "{{route('persons.getPersonsAll')}}" ,
                    "columns": [
                    {data: "id"},
                    {data: "first_name"},
                    {data: "last_name"},
                    {data: "role"},
                    {data: "email"},
                    {data: "shipping_email"},
                    {data: "options"},
                ]
            } );

        } );
        // function traerData(id){
        //     fetch("api/marcas/get/"+id,{
        //         method: 'get'
        //     }).then(function(response){
        //         return response.json();
        //     }).then(function(json){
        //         console.log(json['name']);
        //         document.getElementById('m-edit').innerText = json["name"];
        //         $('#myModal').modal('toggle')
        //     });
        // }

</script>
@endsection
 {{--
<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('marcas.update',1)}}" method="put">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Editar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <p>Se actualizara a : <strong id="m-edit"></strong></p>
                    @method('PUT') @csrf
                    <input type="hidden" name="id">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpMarca" placeholder="Nuevo nombre">
                        <small id="helpMarca" class="form-text text-muted">Nuevo nombre</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}