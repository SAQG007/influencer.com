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
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.edit', ['id' => Auth::id()]) }}">{{ __('messages.edit_profile') }}</a></li>

                            @if(Auth::user()->hasRole("Admin"))
                                <li><a class="dropdown-item" href="{{ route('user.create') }}">{{ __('messages.add_new_user') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.all.show') }}">{{ __('messages.subscribers_list') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('quotes.all.show') }}">{{ __('messages.quotes_list') }}</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="{{ route('quote.create') }}">{{ __('messages.add_new_quote') }}</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown changeLang">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('messages.change_language') }}
                            </a>
                            <ul class="dropdown-menu">
                                @if(App::getLocale() != "ur")
                                    <li><a class="dropdown-item" href="{{ route('lang.change', ['lang' => 'ur']) }}">Urdu</a></li>
                                @endif

                                @if(App::getLocale() != "en")
                                    <li><a class="dropdown-item" href="{{ route('lang.change', ['lang' => 'en']) }}">English</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </ul>

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
