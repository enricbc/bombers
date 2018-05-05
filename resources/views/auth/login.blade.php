@extends('layouts.app')

@section('content')
<div class="container "id="altura">
    <div class="row justify-content-center"id="altura">
        <div class="col-md-8 my-auto">
            <div class="card">
                <div class="card-header text-white bg-dark"><a class="underline-small" style="padding-bottom: 0.32rem;">{{ __('Iniciar sessió') }}</a></div>

                <div class="card-body bg-light border-top border-danger">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                          <label for="identity" class="col-md-4 control-label">{{ __('Usuari') }}</label>

                            <div class="col-md-6">
                              <input id="identity" type="identity" class="form-control" name="identity" value="{{ old('identity') }}" autofocus>
                              @if ($errors->has('identity'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('identity') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar credencials') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-dark">
                                    <a class="underline-small" style="padding-bottom: 0.32rem;">{{ __('Accedeix') }}</a>
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
