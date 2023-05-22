@extends('layouts.app')

@section('content')
<div class="container">


    siamo dentro CREATE, caro il nostro bel {{ $user->name }}

    <form class="row g-3" action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-12">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="img" class="form-label">img</label>
            <input type="file" class="form-control" id="url" name="img" value="{{ old('img') }}">
            @error('img')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <span class="input-group-text">€</span>
                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}">
            </div>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="is_visible" class="form-label">Visibilità</label>
            <select name="is_visible" class="form-control" id="is_visible">
                <option value="1">Visibile</option>
                <option value="0">Non visibile</option>
            </select>
            @error('is_visible')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save new Project</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{-- $error->all() ci restituisce un array/collection, che cicla --}}
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</div>
@endsection