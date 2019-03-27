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
                    <button class="btn btn-success btn-sm update-cart" data-id="{{ $id }}"><i class="far fa-save"></i></button>

                    <form class="btn" action="{{route('cart.destroy',$id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach @endif

        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total {{ $total }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection