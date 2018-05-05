<div class="row pl-0" id="altura">

  <div class="ml-0 col-sm-4 col-md-2 col-lg-2 col-xl-2 border-right border-danger rounded-right py-4 d-none d-sm-block" id="altura">
    <!-- Aqui nom del usuri/parck -->
    <nav aria-label="breadcrumb bg-transparent">
      <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item active underline-small text-uppercase" aria-current="page">{{ Auth::user()->name }}</li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span><br></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
      </ol>
    </nav>
    <div class="row ">
      <div class="col pr-0 mt-2">
        <!-- Split dropright button -->
        <div class="btn-group-vertical dropright btn-block">
          <div class="btn-group dropright" role="group">
            <button type="button" class="btn btn-secondary btn-lg " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p class="underline-small text-left">Backups</p>
            </button>
            <!-- Dropdown menu links -->
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Copies de seguretat</h6>
              <a class="dropdown-item" href="#">Afegir veichles</a>
              <a class="dropdown-item" href="{!! route('backup') !!}">Consultar veichles</a>
            </div>
          </div>
          <div class="btn-group  dropright" role="group">
            <button type="button" class="btn btn-secondary btn-lg " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p class="underline-small text-left">Parcs</p>
            </button>
              <!-- Dropdown menu links -->
              <div class="dropdown-menu">
                <h6 class="dropdown-header">Gestio dels parcs</h6>
                <a class="dropdown-item" href="{{action('UserController@create')}}">Afegir parcs</a>
                <a class="dropdown-item" href="{{action('UserController@index')}}">Consultar parcs</a>
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
