<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <!-- <link rel="stylesheet" href="{{asset('home/css/usernavbar.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/dorpdown.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('homepage')}}">Happy shopping</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href={{ url('/showcart') }}>Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href={{ url('/showorder') }}>Order</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login')}}">Log In</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('myorder')}}">Myorder</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                    @endguest

                </ul>
                <form action="{{url('product_search')}}" method="get"class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="search"placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- <nav>
        <ul>
            <li><a href="{{route('homepage')}}">Happy Shopping</a></li>
            <li><a href="{{route('homepage')}}">Home</a></li>

            @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/homeuser') }}">Account</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Log in</a></li>
                        

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
            @endif


            @guest
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">Log In</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @else

                <div class="dropdown">
                    <a>
                        <button> {{ Auth::user()->name }}</button>
                    </a>
                    <div class="content">
                    <a href="#">Profile</a>
                    <a href="{{route('myorder')}}">My Order</a>
                    <div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                    </div>
                    </div>
             @endguest


            <li><a href="{{ url('/showcart') }}">Cart</a></li>
            <li><a href="{{ url('/showorder') }}">Order</a></li>
        </ul>
    </nav>
    <script>
        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>