@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">		
		<div class="col-sm-12 col-md-1"></div>

        <div class="col-sm-12 col-md-4">
			<div> <h3>{{$cupon->product->name}}</h3> </div>
            <div>
				<img class="img-fluid" src="{{asset($cupon->product->image)}}">
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
			<div> <label id="l_Vigencia" class="form-label">□ Vence: {{ $cupon->date_expiration }}</label> </div>
			<div> <label id="l_Descripcion" class="form-label">□ Descripcion: {{ $cupon->product->description }}</label> </div>
			<div> <label id="l_Empresa" class="form-label">□ Empresa: {{ $cupon->company->name }}</label> </div>
			<div> <label id="l_Categoria" class="form-label">□ Categoria: {{ $cupon->product->category->name }}</label> </div>
			<div> <label id="l_Marca" class="form-label">□ Marca: {{ $cupon->product->brand->name }}</label> </div>
		</div>
		
		<div class="col-sm-12 col-md-2">
			<div class="mx-auto">
				<div> <label id="l_Cantidad">{{ $cupon->stock }} cupones disponibles</label> </div>
				<div> <label id="l_Precio "><B><del>${{ $cupon->price }}</del> - {{ $cupon->discount }}%<B></label> </div>
				<div> <label id="l_PrecioFinal" style="color:red;"><B>${{ $cupon->end_price }}<B></label> </div>
				
				
				<form class="mx-auto float-right" action="{{route('cart.store',$cupon->id)}}" method="post">
					<button type="submit" class="btn btn-primary">
						Añadir al carrito
					</button>                               
					@csrf
				</form>
			</div>
        </div>
		
		<div class="col-sm-12 col-md-1"></div>
    </div>

</div>
@endsection