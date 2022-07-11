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
                    <a class="nav-link {{ Request::is("company*")? "active" : "" }}" href="/company">Manage Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("real-estate*")? "active" : "" }}" href="/real-estate">Manage Real Estates</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link" style="background:none;border:none">Logout</button>
                    </form>
                </li>
            @elseif (Auth::check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("about-us")? "active" : "" }}" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("buy")? "active" : "" }}" href="/buy">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("rent")? "active" : "" }}" href="/rent">Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("cart")? "active" : "" }}" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link" style="background:none;border:none">Logout</button>
                    </form>
                </li>
            @else
                @if (!Request::is("login") && !Request::is("register"))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is("about-us")? "active" : "" }}" href="/about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is("buy")? "active" : "" }}" href="/buy">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is("rent")? "active" : "" }}" href="/rent">Rent</a>
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
