{{-- Layout --}}
@extends('layouts.app')
{{-- Content --}}
@section('content')
    {{-- Titolo --}}
    <h1 class="mt-5">
        Benvenuto nella tua dashboard
    </h1>

    {{-- Lista --}}
    <ul class="list-group mt-3">
        {{-- Piatti --}}
        <li class="list-group-item"><a href="{{ route('dishes.index') }}">Visualizza i tuoi piatti</a></li>
        {{-- Ordini --}}
        <li class="list-group-item"><a href="{{ route('orders.index') }}">Visualizza i tuoi ordini</a></li>
    </ul>
@endsection
