@extends('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <form action="{{route('empresa')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Codigo del Producto</label>
                    <input class="form-control" name="codigoCoupon" type="text" placeholder="Codigo del producto  a redimir">
                </div>                       
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            @if(isset($coupon))
            @include('coupons.partials.card')
            @endif
        </div>    
    </div>
</div>