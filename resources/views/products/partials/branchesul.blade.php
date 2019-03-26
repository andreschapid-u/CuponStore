@forelse ($branches as $branch) {{--
<div class="form-check custom-checkbox form-check-inline float-left"> --}}
    <div class="col-md-6 align-content-start">
        <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="branches[]" id="branch-{{$branch->id}}" value="{{$branch->id}}"> {{$branch->address}}(<small>{{$branch->city->name}}</small>)
        </label>
    </div>
@empty
<strong>No hay sucursales</strong> @endforelse