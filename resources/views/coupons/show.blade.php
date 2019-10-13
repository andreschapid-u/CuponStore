@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Ver Empresa</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <h4><strong>{{ $company->name}}</strong></h4>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nit" class="col-md-4 col-form-label text-md-right">NIT</label>
                        <div class="col-md-6">
                            <p><strong>{{ $company->nit}}</strong></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">logo</label>
                        <div class="col-md-6">
                            <img clas="img-fluid" src="{{asset($company->image)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="person_id" class="col-md-4 col-form-label text-md-right">Empresario</label>
                        <div class="col-md-6">
                            <p><strong>{{ $company->boss->getFullName()}}</strong></p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <div class="mx-auto">
                                <h4><strong>SUCURSALES</strong></h4>
                            </div>
                        </div>
                        <div class="col-sm-12 ">
                            <table class="table datatable table-striped table-bordered table-hover table-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>ID</th>
                                        <th>DIRECCION</th>
                                        <th>TELEFONO</th>
                                        <th>DEPARTAMENTO</th>
                                        <th>CIUDAD</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mx-auto">
                            <a name="" id="" class="btn btn-primary" href="{{route('companies.index')}}" role="button">Atras</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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
                        "ajax" : "{{route('api.companies.branches',$company->id)}}" ,
                        "columns": [
                        {data: "id"},
                        {data: "address"},
                        {data: "telephone"},
                        {data: "department"},
                        {data: "city"},
                    ]
                } );

            } );

</script>
@endsection