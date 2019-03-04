@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('persons.store') }}" class="needs-validation" novalidate>
                        @csrf @method('post')

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres') }}"
                                    required autofocus> @if ($errors->has('nombres'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos"
                                    value="{{ old('apellidos') }}" required autofocus> @if ($errors->has('apellidos'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo_envio" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="correo_envio" type="email" class="form-control{{ $errors->has('correo_envio') ? ' is-invalid' : '' }}" name="correo_envio"
                                    value="{{ old('correo_envio') }}" required> @if ($errors->has('correo_envio'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo_envio') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    value="123456" required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="123456" required>
                            </div>
                        </div>


                        @guest
                        @else
                        @if (Auth::user()->isAdmin())
                        @endif
                        @endif
                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{__('Role')}}</label>
                            <div class="col-md-6">
                                <select class="form-control {{ $errors->has('rol') ? ' is-invalid' : '' }} " name="rol" id="rol">
                                    <option value="0" >Seleccione uno...</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}" >{{$rol->name}}</option>
                                    @endforeach
                              </select>

                              @if ($errors->has('rol'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span> @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection