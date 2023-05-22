@extends('layouts.app')
@section('content')


<div class="welcome container p-5">

    
    @guest
    <div class="wrapper d-flex justify-content-center align-items-center gap-3">
        <a class="nav-link" href="{{ route('login') }}">
            <div class="card d-flex justify-content-center align-items-center">
                {{ __('Login') }}
            </div>
        </a>
        @if (Route::has('register'))
        <a class="nav-link" href="{{ route('register') }}">
            <div class="card d-flex justify-content-center align-items-center">
                {{ __('Register') }}
            </div>
        </a>
    </div>

    @endif
    @else
    <h1 class="my-5 text-center">
        Benvenuto nella tua dashboard <span class="badge bg-warning">{{ Auth::user()->name }}</span>
    </h1>

    <div class="wrapper d-flex justify-content-center align-items-center gap-3">
        <a class="nav-link" href="{{ route('dishes.index') }}">
            <div class="card d-flex justify-content-center align-items-center text-center">
                Visualizza i tuoi <span class="text-high"> piatti </span>
            </div>
        </a>
        <a class="nav-link" href="#">
            <div class="card d-flex justify-content-center align-items-center text-center">
                Visualizza i tuoi <span class="text-high"> ordini </span>
            </div>
        </a>
    </div>

    {{-- <ul class="list-group mt-3">
        <li class="list-group-item"><a href="{{ route('dishes.index') }}">Visualizza i tuoi piatti</a></li>
        <li class="list-group-item"><a href="">Visualizza i tuoi ordini</a></li>
    </ul> --}}
    @endguest
    


</div>



@endsection