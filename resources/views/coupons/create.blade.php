@extends('layouts.app')
@section('content') {{-- {{dd($empresarios)}} --}}

<div class="container">
    <div class="row ">
        <h1 class="mx-auto">Crear CUPON</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white" id="cardCupon">Crear Cupon
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('coupons.store', $product->id) }}">
                        @csrf @method('POST')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product" class="col-form-label text-md-right" id="l_Producto">Producto</label>

                                <div class="">
                                    <input disabled id="" type="text" class="form-control" value="{{$product->name}}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bransh" class="col-form-label text-md-right" id="l_Marca">Marca</label>
                                <div class="">
                                    <input class="form-control" disabled type="text" name="" id="" value="{{$product->brand->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Empresa" class="col-form-label text-md-right" id="l_Empresa">Empresa</label>

                                <div class="">
                                    <select class="form-control" id="Empresa" name="Empresa" required>
                                    <option selected="true" value="">Seleccione una...</option>
                                    @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-gruop col-md-8 my-sm-2">
                                <div class="text-center">
                                    <label for="textDescrip" id="l_Descripcion">Sucursales</label>
                                </div>
                                <div id="sucursales" class="row bg-warning px-sm-3">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-gruop col-md-6">
                                <div class=" mx-auto">
                                    <img src="{{asset($product->image)}}" alt="Img_Producto" class="img-fluid" style="max-width: 300px;">
                                </div>
                            </div>

                            <div class="form-gruop col-md-6">
                                <div class="text-center">
                                    <label for="textDescrip" id="l_Descripcion">Descripcion</label>
                                    <textarea disabled style="resize:none;" class="form-control" rows="6">{{$product->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Precio" class="col-form-label text-md-right" id="l_Precio">Precio</label>

                                <div class="">
                                    <input min="0" id="Precio" name="Precio" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="PrecioBase" class="col-form-label text-md-right" id="l_PB">Precio Base</label>

                                <div class="">
                                    <input min="0" name="PrecioBase" id="PrecioBase" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Descuento" class="col-form-label text-md-right" id="l_Descuento">Descuento (Max: <span id="des">0%</span> )</label>

                                <div class="">
                                    <div class="slidecontainer">
                                        <input required name="Descuento" type="range" min="0" max="0" value="0" id="Descuento" class="form-control-range">
                                    </div>
                                </div>

                                <label class="col-form-label text-md-right" id="l_Valor"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="PrecioFinal" class="col-form-label text-md-right" id="l_PF">Precio Final</label>

                                <div class="">
                                    <input name="PrecioFinal" id="PrecioFinal" min="0" type="number" class="form-control" required disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="FechaVencimiento" class="col-form-label text-md-right" id="l_FechaExp">Fecha Terminal</label>

                                <div class="">
                                    <input id="FechaVencimiento" name="FechaVencimiento" type="date" min="{{ date(" Y-m-d H:i:s ")}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Cantidad" class="col-form-label text-md-right" id="l_Cantidad">Cantidad</label>

                                <div class="">
                                    <input id="Cantidad" name="Cantidad" type="number" min="1" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button id="btnCrear" type="submit" class="btn btn-success btn-md btn-block">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('/js/popper.min.js')}}"></script>
    @include("coupons.partials.branches_search") {{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script> --}}
<script>
    // window.sr = ScrollReveal();
    // sr.reveal('.card', {
    //     duration: 1000,
    //     origin: 'bottom',
    //     distance: '300px'
    // });

    var slider = document.getElementById("Descuento");
    var output = document.getElementById("l_Valor");
    var porc = '%';
    output.innerHTML = slider.value + porc;

    slider.oninput = function() {
        output.innerHTML = this.value + porc;
    }

    $(window).ready(function(){
        document.getElementById("Precio").addEventListener("keyup",function(){
            document.getElementById("PrecioBase").value = this.value;
            document.getElementById("PrecioBase").min = 0;
            document.getElementById("PrecioBase").max = this.value;
            document.getElementById("Descuento").value = 0;
        })
        document.getElementById("PrecioBase").addEventListener("focus", function () {
            var base = parseFloat(this.value)
            var precio = parseFloat(document.getElementById("Precio").value)
            if(base>precio){
                this.value=precio
            }
        })
        document.getElementById("PrecioBase").addEventListener("input", function () {
            document.getElementById("Descuento").value = 0;
            var base = parseFloat(this.value)
            var precio = parseFloat(document.getElementById("Precio").value)
            document.getElementById("PrecioFinal").value =precio;
            document.getElementById("l_Valor").innerHTML="0%";
            if(base>precio){
                this.value=precio
                base = precio
                document.getElementById("PrecioFinal").value =this.value;

            }
            if(precio > 0){
                var maxDescuento = Math.floor( (100 - ((base * 100) / precio)))
                document.getElementById("Descuento").max = maxDescuento
                document.getElementById("des").innerHTML= maxDescuento+"%";
                // console.log(maxDescuento);
            }

        })

        document.getElementById("Descuento").addEventListener("input", function () {
            var porc = parseInt(this.value)
            // console.log(porc);
            var precio = parseInt(document.getElementById("Precio").value)
            // console.log(precio);
            var final = (((100-porc)*precio)/100)
            // console.log(final);

            document.getElementById("PrecioFinal").value =final

        })

    });

</script>
@endsection