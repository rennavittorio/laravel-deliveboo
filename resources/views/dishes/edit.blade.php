@extends('layouts.app')

@section('content')
<div class="container">


    <h2 class="fs-4 text-secondary my-4">
        Ciao {{ $user->name }}, modifica il tuo {{ $dish->name }}:
    </h2>


    <form class="row g-3" action="{{ route('dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="col-12">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dish->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="img" class="form-label">Immagine</label>
            
            <input type="file" class="form-control @error('img') is-invalid @enderror" id="url" name="img" value="{{ old('img', $dish->img) }}">
            @error('img')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description', $dish->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <div class="input-group">
                <span class="input-group-text">€</span>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" min="0" value="{{ old('price', $dish->price) }}">
            </div>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="is_visible" class="form-label">Visibilità</label>
            <select name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible" value="">
                <option @selected(old('is_visible', $dish->is_visible) == 1) value="1">Visibile</option>
                <option @selected(old('is_visible', $dish->is_visible) == 0) value="0">Non visibile</option>
            </select>
            @error('is_visible')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Modifica</button>
        </div>
    </form>



</div>
@endsection