{{-- Layout --}}
@extends('layouts.app')
{{-- Contenuto --}}
@section('content')
    {{-- Titolo --}}
    <h1 class="my-4">
        I tuoi ordini
    </h1>
    {{-- Filtri --}}
    <div class="d-flex gap-2 justify-content-end mb-2">
        {{-- Tutti gli ordini --}}
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Tutti gli ordini</a>
        {{-- Ordini pagati --}}
        <form action="{{ url()->full() }}" method="GET">
            {{-- Bottone per ottenere solo gli ordini pagati --}}
            <button class="btn btn-success" name="payment" type="submit" value="1">Ordini pagati</button>
        </form>
        {{-- Ordini non pagati --}}
        <form action="{{ url()->full() }}" method="GET">
            {{-- Bottone per ottenere solo gli ordini non pagati --}}
            <button class="btn btn-warning" name="payment" type="submit" value="0">Ordini non pagati</button>
        </form>
    </div>
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
            {{-- Se l'utente filtra gli ordini per pagamento --}}
            @if (request()->has('payment'))
                {{-- Ordini non pagati --}}
                @if (request()->query('payment') === '0')
                    {{-- Ciclo --}}
                    @foreach ($orders as $order)
                        {{-- Se l'ordine non è stato pagato, mostro le sue informazioni --}}
                        @if ($order->status === 0)
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
                                {{-- Stato del pagamento --}}
                                <td>Non pagato</td>
                                {{-- Totale --}}
                                <td>{{ $order->total }}</td>
                                {{-- Recap dell'ordine --}}
                                <td><a href="#">Piatti ordinati</a></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                {{-- Ordini pagati --}}
                @if (request()->query('payment') === '1')
                    {{-- Ciclo --}}
                    @foreach ($orders as $order)
                        {{-- Se l'ordine è stato pagato, mostro le sue informazioni --}}
                        @if ($order->status === 1)
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
                                {{-- Stato del pagamento --}}
                                <td>Pagato</td>
                                {{-- Totale --}}
                                <td>{{ $order->total }}</td>
                                {{-- Recap dell'ordine --}}
                                <td><a href="#">Piatti ordinati</a></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @else
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
                        {{-- Se l'ordine non è stato pagato --}}
                        @if ($order->status === 0)
                            {{-- Stato del pagamento --}}
                            <td>Non pagato</td>
                        @endif
                        {{-- Se l'ordine è stato pagato --}}
                        @if ($order->status === 1)
                            {{-- Stato del pagamento --}}
                            <td>Pagato</td>
                        @endif
                        {{-- Totale --}}
                        <td>{{ $order->total }}</td>
                        {{-- Recap dell'ordine --}}
                        <td><a href="#">Piatti ordinati</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection