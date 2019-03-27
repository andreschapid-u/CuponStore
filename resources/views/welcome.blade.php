@extends('layouts.app')

@section('content')
<form class="form-inline"  action="/eje" method="POST">
    <div class="form-group" >
        @csrf
        <label for="aaa">Click</label>
        <input type="submit" name="aaa" id="aaa" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Redirect</small>
    </div>
</form>
@include('coupons.index')
@endsection