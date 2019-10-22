<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item  {{ (request()->is('/')) ? 'active' : '' }}">
        <a class="nav-link" href="/">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('package')) ? 'active' : '' }}">
        <a class="nav-link" href="/package">Package</a>
      </li>
      <li class="nav-item {{ (request()->is('whois')) ? 'active' : '' }}">
        <a class="nav-link" href="/whois">Whois</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
          @if (Route::has('login'))
                @auth
                 <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="{{ url('/admin/dashboard') }}">Home</a>
                 </li>
                @else
                 @if (Route::has('register'))
                    <li class="nav-item"> <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">Login</a></li>

                    <li class="nav-item"><a class="nav-link waves-effect waves-light" href="{{ route('register') }}">Register</a></li>
                 @endif
               @endauth
            @endif


      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> --}}
    </ul>
  </div>
</nav>
<!--/.Navbar -->
