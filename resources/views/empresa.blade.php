@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <form action="{{route('empresa')}}" method="post">
            @csrf
                <div class="form-group">
                    <h3><label for="exampleInputEmail1">Codigo del Producto</label><h3>
                    <input class="form-control" name="codigoCoupon" type="text" placeholder="Codigo del producto  a redimir">
                </div>                       
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>   
			@if(isset($coupon))
            @include('coupons.partials.card')
            @endif
    </div>
</div>
@endsection