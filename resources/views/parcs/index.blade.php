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
            <li class="breadcrumb-item active" aria-current="page">Index</li>


          </ol>
        </nav>
      </div>
      <hr class="my-0 d-none d-sm-block">
      <div class="row">
        <div class="col-12 mt-3">
          {{-- Warning --}}
        @if (session('warning'))
          <div class="alert alert-warning alert-dismissible fade show">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        {{-- Success --}}
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        </div>
      </div>
      <!-- Boto per crear usuaris-->
      <div class="row">
          <div class="col-xs-12 col-2 my-3 clearfix">
              <a id="create-new-backup-button" href="{{action('UserController@create')}}" class="btn btn-danger bg-dark">
                <p class="my-0 underline-small"><i class="fas fa-archive"></i> Nou parc</p>
              </a>
          </div>
      </div>
      <!--Fi BOTO-->
      <!--Taula Usuaris-->
      <div class="row">
        <div class="col-xs-12 col-12">
            @if (count($users))

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Codi</th>
                        <th>Regio</th>
                        <th>Data modificació</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{   $user['codi_parc'] }}</td>
                            <td>
                              {{ $user['region_id'] }}
                            </td>
                            <td>
                              @php(\Jenssegers\Date\Date::setLocale('ca'))
                              {{  Date::now()->timespan(($user['updated_at'])->format('j F Y')) }}
                            </td>
                            <td class="text-right ">
                              <a class="btn btn-xs btn-default"
                                 href="{{ url('user/'.$user['id'].'/edit') }}">
                                 <i class="fas fa-pencil-alt"></i> Editar
                               </a>
                               <a class="btn btn-xs btn-danger" data-button-type="delete"
                                  href="{{ url('user/delete/'.$user['id']) }}"><i class="fas fa-times"></i>
                                   Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>No hi han parcs</h4>
                </div>
            @endif
        </div>
      </div>
      <!--Fi taula Usuaris-->
      {!! QrCode::size(300)->generate(route('user.index')); !!}
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
