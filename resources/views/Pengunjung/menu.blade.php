<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <img src="{{ asset('pictures') }}/seek.png" width=30 height=30 alt="">

        @auth
          <li class="nav-item mt-1 ml-2">
            <a class="nav mt-1" aria-current="page">Welcome Back, {{ auth()->user()->name }}! |</a>
          </li>
        @endauth

        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/loker2">Lowongan Kerja</a>
        </li>
      </ul>

      <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-outline-primary" href="{{route('register')}}">Register</a>
                <a class="btn btn-outline-primary" href="{{route('login')}}">Login</a>
            </li>
      </ul>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>