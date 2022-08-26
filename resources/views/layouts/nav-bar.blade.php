<nav class="navbar navbar-expand-lg mb-4" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand swing" style="font-family: app_name_font" href="{{ route('home') }}">
            <img src="{{ asset('icons/motivation-icon.png') }}" width="40px" height="40px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width: 200px">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Link</a>--}}
{{--                </li>--}}
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>

                            @if(Auth::user()->hasRole("Admin"))
                                <li><a class="dropdown-item" href="{{ route('user.create') }}">Add New User</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.all.show') }}">Subscribers List</a></li>
                                <li><a class="dropdown-item" href="{{ route('quotes.all.show') }}">Quotes List</a></li>
                            @endif

                            <li>

                        </ul>
                    </li>

                    @if(Auth::user()->hasRole("Admin"))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('quote.create') }}">Add New Quote</a>
                        </li>
                    @endif
                @endif

            </ul>
{{--            <div>--}}
{{--                <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Change Language--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            @if(App::getLocale() != "ur")--}}
{{--                                <li><a class="dropdown-item" href="#">Urdu</a></li>--}}
{{--                            @endif--}}

{{--                            @if(App::getLocale() != "en")--}}
{{--                                <li><a class="dropdown-item" href="#">English</a></li>--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <form class="d-flex" role="search">--}}
{{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--            </form>--}}

            @if(!Auth::check())
                <div class="text-white" style="margin-right: 0.5%">
                    <a class="text-muted" href="{{ route('login') }}">Login</a>
                </div>
                <div class="text-white" style="margin-left: 1%; margin-right: 1%">
                    <a class="text-muted" href="{{ route('register') }}">Register</a>
                </div>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Logout</button>
                </form>
            @endif

        </div>
    </div>
</nav>
