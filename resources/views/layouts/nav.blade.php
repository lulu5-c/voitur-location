<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="nav">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('images/logo.png') }}" alt="Logo" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse Navbar" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ms-auto fs-3" id="navNavbar" >
                    @if(request()->routeIs('home'))
                        <li class="nav-item active">
                            <a class="nav-link " aria-current="page" href="/">Acceuil</a>
                        </li>
                    @else
                        <li class="nav-item ">
                            <a class="nav-link " aria-current="page" href="/">Acceuil</a>
                        </li>
                    @endif
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                @if(request()->routeIs('login'))
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                                </li>
                                @else
                                    <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                                    </li>
                                 @endif
                            @endif

                            @if (Route::has('register'))
                                @if(request()->routeIs('registrer'))
                                <li class="nav-item active">
                                <a class="nav-link" href="{{ route('register') }}">S'incrire</a>
                                 </li>
                                @else
                                <li class="nav-item ">
                                <a class="nav-link" href="{{ route('register') }}">S'incrire</a>
                                </li>
                                @endif
                            @endif
                        @else
                            @if(request()->routeIs('louer'))
                            <li class="nav-item active">
                                <a class="nav-link" href="/louer">Louer</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/louer">Louer</a>
                            </li>
                            @endif
                                @if(request()->routeIs('restituer'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="/restituer">Restituer</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/restituer">Restituer</a>
                                    </li>
                                @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        @if(request()->routeIs('contact'))
                            <li class="nav-item active">
                                <a class="nav-link" href="/contact">Contacter</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Contacter</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>