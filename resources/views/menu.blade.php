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
            <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/loker">Lowongan Kerja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/likes">Likes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            History
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/justapply">Just Apply</a>
            <a class="dropdown-item" href="/administration">Administration</a>
            <a class="dropdown-item" href="/interview">Interview</a>
          </div>
        </li>
      </ul>

      {{-- Logout --}}
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-link"><i class="fas fa-sign-out-alt mt-1"></i> Logout</button>
      </form>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>