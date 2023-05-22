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
    <h1 class="mt-5">
        Benvenuto nella tua dashboard <span class="badge bg-warning">{{ Auth::user()->name }}</span>
    </h1>

    <ul class="list-group mt-3">
        {{-- Piatti --}}
        <li class="list-group-item"><a href="{{ route('dishes.index') }}">Visualizza i tuoi piatti</a></li>
        {{-- Ordini --}}
        <li class="list-group-item"><a href="">Visualizza i tuoi ordini</a></li>
    </ul>
    @endguest
    


</div>



@endsection