@extends('layouts.app')

@section('content')
<div class="container">


    <h2 class="fs-4 text-secondary my-4">
        Ciao {{ $user->name }}, ecco la lista dei tuoi piatti:
    </h2>

    <div class="grid">

        
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
                <p class="card-text">{{ $dish->description }}</p>
                <div class="wrapper-footer-card d-flex justify-content-between align-items-center mt-auto">

                    <p class="card-text badge m-0 bg-warning">{{ $dish->price }}</p>
                    <p class="card-text badge bg-danger">{{ $dish->is_visible }}</p>

                </div>
                <a class="btn btn-success my-2" href="{{ route('dishes.edit', $dish->id) }}">
                    Edit
                </a>
            </div>
        </div>
            
        @endforeach

    </div>


    <a href="{{ route('dishes.create')}}" class="btn btn-primary m-3">create</a>
    {{-- <a href="{{ route('dishes.edit')}}" class="btn btn-primary m-3">edit</a> --}}


</div>
@endsection