<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0e185f">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">megAWealth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is("/")? "active" : "" }}" aria-current="page" href="/">Home</a>
          </li>
          @if (Gate::allows('isAdmin'))
            <li class="nav-item">
                <a class="nav-link" href="#">Manage Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Manage Real Estates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
          @elseif (Auth::check())
            @if (Request::is("/"))
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @endif
          @else
            @if (Request::is("/"))
                <li class="nav-item">
                    <a class="nav-link" href="#">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rent</a>
                </li>
            @endif
            <li class="nav-item">
              <a class="nav-link {{ Request::is("login")? "active" : "" }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is("register")? "active" : "" }}" href="/register">Register</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
</nav>
