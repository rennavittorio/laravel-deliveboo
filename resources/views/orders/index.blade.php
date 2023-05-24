{{-- Layout --}}
@extends('layouts.app')
{{-- Contenuto --}}
@section('content')
    {{-- Titolo --}}
    <h1 class="my-4">
        I tuoi ordini
    </h1>
    {{--Tabella --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Codice postale</th>
                <th scope="col">Orario</th>
                <th scope="col">Stato pagamento</th>
                <th scope="col">Totale (€)</th>
                <th scope="col">Recap</th>
            </tr>
        </thead>
        <tbody>
            {{-- Ciclo --}}
            @foreach ($orders as $order)
                <tr>
                    {{-- Nome e cognome del cliente --}}
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    {{-- Email --}}
                    <td>{{ $order->email }}</td>
                    {{-- Telefono --}}
                    <td>{{ $order->phone }}</td>
                    {{-- Indirizzo --}}
                    <td>{{ $order->address }}</td>
                    {{-- Codice postale --}}
                    <td>{{ $order->postal_code }}</td>
                    {{-- Orario --}}
                    <td>{{ $order->created_at }}</td>
                    {{-- Se lo stato del pagamento è a zero --}}
                    @if ($order->status === 0)
                        {{-- Ordine non pagato --}}
                        <td>Non pagato</td>
                    {{-- Altrimenti --}}
                    @else
                        {{-- Ordine pagato --}}
                        <td>Pagato</td>
                    @endif
                    {{-- Totale --}}
                    <td>{{ $order->total }}</td>
                    {{-- Recap dell'ordine --}}
                    <td><a href="#">Piatti ordinati</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection