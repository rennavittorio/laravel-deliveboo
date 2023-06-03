@extends('layouts.app')
@section('content')


<div class="welcome container p-sm-1 p-md-5">

    
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
        <div class="dish-wrapper col-md-9 col-sm-12">
            <div class="card p-3">
                @if($total_dishes_visible < $total_dishes)
                <p>
                    Hai <span class="text-high text-success">{{ $total_dishes }}</span> piatti salvati, di cui <span class="text-high text-danger">{{ $total_dishes_not_visible }}</span> non sono visibili ai clienti
                </p>
                @else
                <p>
                    Hai <span class="text-high text-success">{{ $total_dishes }}</span> piatti salvati, tutti visibili al cliente
                </p>
                @endif
                <a class="nav-link" href="{{ route('dishes.index') }}">Vai ai tuoi piatti</a>
            </div>
        </div>
        <div class="order-wrapper col-md-9 col-sm-12">
            <div class="card p-3">
                @if($total_orders_paid < $total_orders)
                <p>
                    Hai <span class="text-high text-success">{{ $total_orders }}</span> ordini, di cui <span class="text-high text-danger">{{ $total_orders_not_paid }}</span> non pagati
                </p>
                @else
                <p>
                    Hai <span class="text-high text-success">{{ $total_orders }}</span> ordini, tutti pagati
                </p>
                @endif
                <a class="nav-link" href="{{ route('orders.index') }}">Vai ai tuoi ordini</a>
            </div>
        </div>
        <div class="order-wrapper col-md-9 col-sm-12">
            {{-- Statistiche --}}
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Incasso mensile (€)',
                data: [{{ $sum[0] }}, {{ $sum[1] }}, {{ $sum[2] }}, {{ $sum[3] }}, {{ $sum[4] }}, {{ $sum[5] }}, {{ $sum[6] }}, {{ $sum[7] }}, {{ $sum[8] }}, {{ $sum[9] }}, {{ $sum[10] }}, {{ $sum[11] }}],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
    {{-- <ul class="list-group mt-3">
        <li class="list-group-item"><a href="{{ route('dishes.index') }}">Visualizza i tuoi piatti</a></li>
        <li class="list-group-item"><a href="">Visualizza i tuoi ordini</a></li>
    </ul> --}}
    @endguest
    


</div>


@endsection