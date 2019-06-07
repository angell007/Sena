@extends('laracrud::layouts.app')

@section('parent-content')
    <nav class="navbar navbar-expand-lg  navbar-dark bg-primary font-weight-bold text-uppercase text-light">
        <div class="container ">
            <a href="{{ url('/') }}" class="navbar-brand text-light ">
                <i class="fal {{ config('laracrud.icon') }} "> </i> Gestion de horarios
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon bg-dark"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav"  >
                <ul class="navbar-nav ml-auto ">
                    @include('laracrud::layouts.nav')
                    <li class="nav-item dropdown">
                        <a href="#" id="userDropdown" class="nav-link text-light dropdown-toggle" role="button" data-toggle="dropdown">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button type="button" class="dropdown-item" data-modal="{{ route('profile') }}">Profile</button>
                            <button type="button" class="dropdown-item" data-modal="{{ route('password') }}">Password</button>
                            <form method="POST" action="{{ route('logout') }}" data-ajax-form>
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 mb-5">
        @yield('child-content')
    </div>
@endsection
