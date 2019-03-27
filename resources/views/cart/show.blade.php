@extends('layouts.app')
@section('title', ' | Carrito')
@section('styles') {{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

<div class="container">

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Producto</th>
                <th style="width:10%">Precio</th>
                <th style="width:8%">Cantidad</th>
                <th style="width:22%" class="text-center">Sub total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0 ?> @if(session('cart')) @foreach(session('cart') as $id => $details)

            <?php $total += $details['price'] * $details['quantity'] ?>

            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">${{ $details['price'] }}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                </td>
                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                <td class="actions" data-th="">
                    {{-- <button class="btn btn-success btn-sm update-cart" data-id="{{ $id }}"><i class="far fa-save"></i></button>                    --}}

                    <form class="form-inline" action="{{route('cart.destroy',$id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach @endif

        </tbody>
        <tfoot>
            <tr>
                {{--
                <td class="text-center"><strong>Total {{ $total }}</strong></td> --}}
                <td colspan="5" class="text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
            @if(!isset($compra))
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Seguir Comprando</a></td>
                <td colspan="2" class="">
                    <form action="{{route('cart.procesar')}}" method="get">
                        {{-- @csrf --}}
                        <button class="btn btn-primary" type="submit">Procesar Compra</button>
                    </form>
                </td>
            </tr>
            @endif
        </tfoot>
    </table>

    @isset($compra) @guest
    <div class="row">
        <div class="col-12">
            <form class="form-inline" action="/eje" method="get">
                <div class="form-group">
                    {{-- @csrf --}}
                    <button class="btn btn-warning" type="submit">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
    @endguest
    <form action="{{route('cart.comprar')}}" method="post">
        <div class="row">
            @guest
            <div class="col-6">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres..." aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos..." aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo..." aria-describedby="helpId">
                </div>

            </div>
            @endguest
            <div class="col-6">
                <div class="form-group">
                    <label for="FormaPago" class="col-form-label text-md-right">Metod de pago</label>
                    <select required class="form-control " name="FormaPago" id="FormaPago">
                        <option value="" selected>Seleccione uno....</option>
                        @foreach ($metodos_pago as $metodo)
                        <option value="{{$metodo->id}}">{{$metodo->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mx-auto col-sm-12 col-md-2">
                    <button class="btn btn-primary" type="submit">Realizar compra</button>
                </div>
            </div>
        </div>
    </form>
    @endisset
</div>
@endsection