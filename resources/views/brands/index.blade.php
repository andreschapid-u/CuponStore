@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 mx-auto">
            <h3>MARCAS</h3>
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

@section('scripts') @parent


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
                    {data: "id"},
                    {data: "name"},
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