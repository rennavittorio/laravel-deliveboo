@extends('layouts.app')

@section('content')
<div class="container">


    <h2 class="fs-4 text-secondary my-4">
        Ciao {{ $user->name }}, ecco la lista dei tuoi piatti:
    </h2>

    <div class="grid py-5">

        
        <a href="{{ route('dishes.create') }}">
            <div class="card d-flex justify-content-center align-items-center">

                <h1>
                +
                </h1>
            
            </div>
        </a>

        @foreach ($dishes as $dish)

        <div class="card d-flex flex-column">
            <img src="{{ asset('storage/'. $dish->img) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $dish->name }}</h5>
                <p class="card-text">
                    <span class="fw-bold">Descrizione:</span> {{ $dish->description }}
                </p>
                <div class="wrapper-footer-card d-flex justify-content-between align-items-center mt-auto mb-5">

                    <p class="card-text m-0">
                        <span class="fw-bold">Prezzo: </span>
                        <span class="badge bg-success">{{ $dish->price }} €</span>
                    </p>
                    <p class="card-text m-0">
                        <span class="fw-bold">Visibile: </span>
                        @if($dish->is_visible)
                            <span class="badge bg-success">Si</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </p>

                </div>
                <a class="btn btn-warning my-2" href="{{ route('dishes.edit', $dish->id) }}">
                    Modifica
                </a>
            </div>
        </div>
            
        @endforeach

    </div>


</div>
@endsection