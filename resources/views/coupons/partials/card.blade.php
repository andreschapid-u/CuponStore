<div class="col-sm-6 col-md-8 col-lg-3 p-2">
    <div class="card shadow">
        <img class="card-img-top img-fluid" src="{{$coupon->product->image}}" alt="">
        <button type="button" class="btn btn-danger btn-circle float-right align-self-end position-absolute"><strong>{{$coupon->end_discount}}</strong></button>
        <div class="card-body">
            <h4 class="card-title">{{$coupon->product->name}}</h4>
            <div class="row">

                <div class="col-12 ">
                    <div class="btn-group btn-block" role="group" aria-label="">
                        <small class="btn btn-sm badge-light"><del>{{$coupon->price}}<del></small>
                        <small class="btn bg-warning text-bold">{{$coupon->end_price}}</small>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <small class="text-danger text-sm text-center">vence {{$coupon->date_expiration}}</p></small>
                </div>
                <div class="col-12">
                        <!-- <button type="button" class="mx-auto btn btn-sm btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button> -->
                        @if(isset($estado))
                            <h3 class="alert alert-danger">{{$estado}}</h3>
                        @else
                        <form class="mx-auto float-right" action="{{route('redimir')}}" method="post">
                               <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                <button type="submit" class=" btn btn-sm btn-info ">Redimir</i></button>
                                @csrf
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>