<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Laiba's Haven</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('searchblog') }}">Search
                        Blog</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}">Logout</a></li>
                <!-- Profile Dropdown -->
                {{-- <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" id="profileDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3 text-center" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li> --}}
                {{-- <li>{{Auth::user()->name}}</li> --}}
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header-->
<!-- resources/views/partials/header.blade.php -->
<header class="masthead" style="background-image: url('{{ asset($bgImage) }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>{{ $title }}</h1>
                    <span class="subheading">{!! $subtitle !!}</span>
                </div>
            </div>
        </div>
    </div>
</header>
