@extends('layouts.head')

@section('content')
<div class="container pl-0  mx-0 col-12" id="altura">
  @include('layouts.partials.econtainer')
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
