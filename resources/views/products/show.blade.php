@extends('layouts.app')
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Ver Producto</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <h4><strong>{{ $product->name}}</strong></h4>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nit" class="col-md-4 col-form-label text-md-right">Descripción</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->description}}</strong></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">Imagen</label>
                        <div class="col-md-6">
                        <img clas="img-fluid card-img-top" src="{{asset($product->image)}}" style="max-width: 300px;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="person_id" class="col-md-4 col-form-label text-md-right">Categoria</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->category->name}}</strong></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="person_id" class="col-md-4 col-form-label text-md-right">Marca</label>
                        <div class="col-md-6">
                            <p><strong>{{ $product->brand->name}}</strong></p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <div class="mx-auto">
                                <h4><strong>CUPONES</strong></h4>
                            </div>
                        </div>
                        <div class="col-sm-12 ">
                            <table class="table datatable table-striped table-bordered table-hover table-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>ID</th>
                                        <th>PRECIO NORMAL</th>
                                        <th>DESCUENTO</th>
                                        <th>PRECIO FINAL</th>
                                        <th>ESTADO</th>
                                        <th>STOCK</th>
                                        <th>VENCIMIENTO</th>
                                        <th>EMPRESA</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mx-auto">
                        <a name="" id="" class="btn btn-primary" href="{{route('products.index')}}" role="button">Atras</a>
                        </div>
                    </div>
                    </form>

                    <input id="datepicker" width="276" />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/messages/messages.es-es.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es'
    });

    $(document).ready(function(urlAjax, columnas) {
                $('.datatable').dataTable( {
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    "language": {
                        "url": "{{asset('Spanish.json')}}"
                    },
                    "serverSide" : true,
                        "ajax" : "{{route('api.products.coupons',$product->id)}}" ,
                        "columns": [
                        {data: "id"},
                        {data: "price"},
                        {data: "discount"},
                        {data: "stock"},
                        {data: "expiration"},
                        {data: "pribase_pricece"},
                        {data: "company"},
                        {data: "status"},
                    ]
                } );

            } );
</script>
@endsection