{{-- Layout --}}
@extends('layouts.app')
{{-- Contenuto --}}
@section('content')
    {{-- Titolo --}}
    <h1 class="my-4">
        Ordine n°{{ $order->id }}
    </h1>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>
    {{-- Dettagli del cliente --}}
    <h2 class="my-3 fs-3">
        Dettagli cliente
    </h2>
    {{-- Tabella --}}
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
            </tr>
        </thead>
        <tbody>
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
                {{-- Se l'ordine non è stato pagato --}}
                @if ($order->status === 0)
                    {{-- Stato del pagamento --}}
                    <td><span class="badge text-bg-danger">Non pagato</span></td>
                @endif
                {{-- Se l'ordine è stato pagato --}}
                @if ($order->status === 1)
                    {{-- Stato del pagamento --}}
                    <td><span class="badge text-bg-success">Pagato</span></td>
                @endif
                {{-- Totale --}}
                <td>{{ $order->total }}</td>
            </tr>
        </tbody>
    </table>
    {{-- Dettagli dell'acquisto --}}
    <h2 class="my-3 fs-3">
        Piatti ordinati
    </h2>
    {{-- Tabella --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Immagine</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantità</th>
                <th scope="col">Prezzo (€)</th>
                <th scope="col">Totale (€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->dishes as $dish)
                <tr>
                    {{-- Immagine del piatto --}}
                    <td><img style='width: 150px;' src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}"></td>
                    {{-- Nome del piatto --}}
                    <td>{{ $dish->name }}</td>
                    {{-- Quantità del piatto --}}
                    <td>{{ $dish->pivot->quantity }}</td>
                    {{-- Prezzo del piatto --}}
                    <td>{{ $dish->price }}</td>
                    {{-- Totale --}}
                    <td>{{ ($dish->pivot->quantity * $dish->price) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection