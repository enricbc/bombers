@extends('layouts.head')

@section('content')

<div class="container pl-0  mx-0 col-12" id="altura">
@include('layouts.partials.econtainer')
    <!--Fi Contenedor esquerre-->
    <!--Contenedor central-->
    <div class="col-8 py-4" id="altura">
      <div class="row d-none d-sm-block">
        <nav aria-label="breadcrumb bg-transparent">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item" aria-current="page">Home</li>
            <li class="breadcrumb-item" aria-current="page">Parcs</li>
            @if ($user->exists)
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
            @else
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            @endif

          </ol>
        </nav>
      </div>
      <hr class="my-0 d-none d-sm-block">
      <!--Formulari-->
      <div class="card shadow-2">
        <div class="card-body">
          @if ($user->exists)
            <h5 class="card-title">Editar parc</h5>
          @else
            <h5 class="card-title">Crear parc</h5>
          @endif


          {{-- Errors --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if ($user->exists)
            {{Form::open(['url' => "users/$user->id",'method'=>'put'])}}
          @else
            {{ Form::open(array('action' => 'UserController@store')) }}
          @endif
            {{-- Name --}}
            <div class="form-group">
              <label for="userName">Name</label>
              <input type="text" name="name" value="{{ $user->name or old('name') }}" class="form-control" id="userName" aria-describedby="nameHelp" required>
              <small id="nameHelp" class="form-text text-muted">Nom del parc, aquest s'utilitzara per a fer login a l'alicació.</small>
            </div>
            {{-- Email --}}
            <div class="form-group">
              <label for="userEmail">Codi del parc</label>
              <input type="integer" name="codi_parc" value="{{ $user->codi_parc or old('codi_parc') }}" class="form-control" id="userEmail" aria-describedby="emailHelp" required>
              <small id="emailHelp" class="form-text text-muted">Codi del nou parc.</small>
            </div>
            {{-- Password --}}
            <div class="form-group">
              <label for="userPassword">Contrasenya</label>
              <input type="password" name="password" class="form-control" id="userPassword" aria-describedby="passwordHelp" required>
              <small id="passwordHelp" class="form-text text-muted">La contrasenya ha de contindre al menys 6 caracters.</small>
            </div>
            <div class="form-group">
              <label for="userPasswordConf">Repeteix la contrasenya</label>
              <input type="password" name="password_confirmation" class="form-control" id="userPasswordConf" aria-describedby="passwordConfHelp" required>
              <small id="passwordConfHelp" class="form-text text-muted">Torna a entrar la contrasenya sense errors.</small>
            </div>
            {{-- Crear --}}
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
      </form>
      <!--Fi formaulari-->
    </div>
    <!--Fi Contenedor central-->
    <!--Contenedor dret-->
    <div class="mr-0 col-2 py-4 d-none d-md-block pt-5" id="altura">
      <div class="row mr-1 mt-5">
        <iframe src="https://feed.mikle.com/widget/v2/77801/" height="402px" width="100%" class="fw-iframe" scrolling="no" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <!--Fi Contenedor dret-->
</div>


@endsection
