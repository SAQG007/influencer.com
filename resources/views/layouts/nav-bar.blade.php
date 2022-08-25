<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
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
{{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Link</a>--}}
{{--                </li>--}}
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
{{--            <div style="margin-right: 87%">--}}
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
            @endif

        </div>
    </div>
</nav>
