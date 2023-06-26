<header>
    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm ">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.home') }}">
                <div class="logo_laravel text-white">
                    <span class="fs-3">MyDashboard <i class="fa-solid fa-check"></i></span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" target="_blank" href="{{route('home') }}">Home</a>
                    </li>

                    @auth()
                        <li class="nav-item">
                            <a class="nav-link text-white" href=""> Statistiche </a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif

                    @else
                    <li class="d-flex justify-center align-items-center pe-2">
                        <span>{{ Auth::user()->name }}</span>

                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

