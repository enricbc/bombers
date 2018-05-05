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
              <li class="breadcrumb-item active" aria-current="page">Backups</li>
            </ol>
          </nav>
        </div>
        <hr class="my-0 d-none d-sm-block">
        <div class="row">
            <div class="col-xs-12 col-2 my-3 clearfix">
                <a id="create-new-backup-button" href="{{ route('bcreate') }}" class="btn btn-danger bg-dark">
                  <p class="my-0 underline-small"><i class="fas fa-archive"></i> Nova copia de seguretat</p>
                </a>
            </div>
        </div>
            <div class="row">
              <div class="col-xs-12 col-12">
                  @if (count($backups))

                      <table class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>Arxiu</th>
                              <th>Tamany</th>
                              <th>Data</th>
                              <th>Temps</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($backups as $backup)
                              <tr>
                                  <td>{{ $backup['file_name'] }}</td>
                                  <td>{{   SomeClass::bytesToHuman($backup['file_size']) }}</td>
                                  <td>
                                    @php(\Jenssegers\Date\Date::setLocale('ca'))
                                    {{ \Jenssegers\Date\Date::createFromTimestamp($backup['last_modified'])->format('j F Y') }}
                                  </td>
                                  <td>
                                    @php(\Jenssegers\Date\Date::setLocale('ca'))
                                    {{ \Jenssegers\Date\Date::createFromTimestamp($backup['last_modified']) }}
                                  </td>
                                  <td class="text-right">
                                      <a class="btn btn-xs btn-default"
                                         href="{{ url('backup/download/'.$backup['file_name']) }}">
                                         <i class="fas fa-download"></i> Descaregar
                                       </a>
                                      <a class="btn btn-xs btn-danger" data-button-type="delete"
                                         href="{{ url('backup/delete/'.$backup['file_name']) }}"><i class="fas fa-times"></i>
                                          Delete</a>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  @else
                      <div class="well">
                          <h4>No hi han copies de seguretat</h4>
                      </div>
                  @endif
              </div>
            </div>

        </div>


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
