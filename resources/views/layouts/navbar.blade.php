<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Sacramento'; font-size: 2rem">
            <i class="fab fa-instagram-square"></i> |
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-1">

                    <a href="{{route('search')}}" class="nav-link" style="font-size: 1.5rem;color:black"><i
                            class="fas fa-search"></i></a>
                </li>
                <li class="nav-item mt-1">

                    <a href="{{route('post.create')}}" class="nav-link" style="font-size: 1.5rem;color:black">
                        <i class="far fa-plus-square"></i></a>
                </li>
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset('storage/images/avatars/'. Auth::user()->avatar) }}"
                            class=" profile-image img-circle d-inline" style="width: 2.5rem; height: 2.5rem;">
                        {{ Auth::user()->user_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('profile')}}">
                            <i class="fas fa-user-circle"></i>
                            Profile
                        </a>
                        <hr>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
