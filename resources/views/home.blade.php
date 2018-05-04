@extends('layouts.head')

@section('content')
<div class="container pl-0  mx-0 col-12" id="altura">
  <div class="row pl-0" id="altura">

    <div class="ml-0 col-sm-4 col-md-2 col-lg-2 col-xl-2 border-right border-danger rounded-right py-4 d-none d-sm-block" id="altura">
      <!-- Aqui nom del usuri/parck -->
      <nav aria-label="breadcrumb bg-transparent">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item active underline-small text-uppercase" aria-current="page">{{ Auth::user()->name }}</li>
        </ol>
      </nav>
      <div class="row ">
        <div class="col pr-0 mt-2">
          <!-- Split dropright button -->
          <div class="btn-group-vertical dropright btn-block">
            <div class="btn-group  dropright" role="group">
              <button type="button" class="btn btn-secondary btn-lg " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="underline-small text-left">Parcs</p>
              </button>
                <!-- Dropdown menu links -->
                <div class="dropdown-menu">
                  <h6 class="dropdown-header">Gestio dels parcs</h6>
                  <a class="dropdown-item" href="#">Afegir parcs</a>
                  <a class="dropdown-item" href="#">Consultar parcs</a>
                </div>
              </div>
              <div class="btn-group dropright" role="group">
                <button type="button" class="btn btn-secondary btn-lg " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p class="underline-small text-left">Veichles</p>
                </button>
                <!-- Dropdown menu links -->
                <div class="dropdown-menu">
                  <h6 class="dropdown-header">Gestio de veichles</h6>
                  <a class="dropdown-item" href="#">Afegir veichles</a>
                  <a class="dropdown-item" href="#">Consultar veichles</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-8 py-4" id="altura">
      <div class="row d-none d-sm-block">
        <nav aria-label="breadcrumb bg-transparent">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item active underline-small" aria-current="page">Home</li>
          </ol>
        </nav>
      </div>
      <hr class="my-0 d-none d-sm-block">
    </div>
    <div class="mr-0 col-2 py-4 d-none d-md-block pt-5" id="altura">
      <div class="row mr-1 mt-5">
        <iframe src="https://feed.mikle.com/widget/v2/77801/" height="402px" width="100%" class="fw-iframe" scrolling="no" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>


@endsection
