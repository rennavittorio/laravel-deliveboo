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
    <div class="wrapper-profile d-flex flex-column gap-2 justify-content-center align-items-center">
        <div class="rest-img">
            <img src="{{ asset('storage/'. $restaurant->img) }}" alt="">
        </div>
        <h3 class="text-center">{{ $restaurant->name }}</h3>
    </div>
    <h1 class="my-5 text-center">
        Benvenuto nella tua dashboard
    </h1>

    <div class="wrapper d-flex flex-column justify-content-center align-items-center gap-3">
        <div class="dish-wrapper col-6">
            <div class="card p-3">
                <p>
                    Hai <span class="text-high text-warning">{{ $total_dishes }}</span> piatti salvati, di cui <span class="text-high text-warning">{{ $total_dishes_visible }}</span> sono visibili ai clienti
                </p>
                <a class="nav-link" href="{{ route('dishes.index') }}">Vai ai tuoi piatti</a>
            </div>
        </div>

        <div class="order-wrapper col-6">
            <div class="card p-3">
                <p>
                    Hai <span class="text-high text-warning">{{ $total_orders }}</span> ordini, di cui <span class="text-high text-warning">{{ $total_orders_paid }}</span> pagati
                </p>
                <a class="nav-link" href="{{ route('orders.index') }}">Vai ai tuoi ordini</a>
            </div>
        </div>
    </div>

    {{-- <ul class="list-group mt-3">
        <li class="list-group-item"><a href="{{ route('dishes.index') }}">Visualizza i tuoi piatti</a></li>
        <li class="list-group-item"><a href="">Visualizza i tuoi ordini</a></li>
    </ul> --}}
    @endguest
    


</div>



@endsection