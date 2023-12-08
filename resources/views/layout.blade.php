<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Panel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{asset('/img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

</head>

<body>

<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="{{ asset('img/' . auth()->user()->image) }}" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="#">{{auth()->user()->name. ' ' .auth()->user()->surname}}</a></h1>
        </div>

        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="{{route('user.index')}}" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Users</span></a></li>
                <li><a href="{{route('book.index')}}" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Books</span></a></li>
                <li><a href="{{route('author.index')}}" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Authors</span></a></li>
            </ul>
        </nav>
    </div>
</header>

<main id="main">
    @yield('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</main>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
