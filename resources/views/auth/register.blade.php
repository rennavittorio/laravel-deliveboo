@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrazione nuovo utente</div>

                {{-- <div>
                    {{ dd(request()->session()) }}
                </div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- user form --}}
                        <h3>Dati utente</h3>
                        <div class="mb-4 row">

                            <div class="col-6">

                                <label for="name" class="col-md-4 col-form-label text-md-right required-input">Nome</label>
                                <input
                                id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                placeholder="eg. Mario Rossi" required autocomplete="name" autofocus
                                maxlength="255"
                                >
    
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-6">

                                <label for="email" class="col-md-4 col-form-label text-md-right required-input">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" placeholder="eg. mario.rossi@mail.com" required autocomplete="email"
                                maxlength="255"
                                >
        
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                        </div>

                        <div class="mb-4 row">
                            <div class="col-6">

                                <label for="password" class="col-form-label text-md-right required-input">Nuova Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" placeholder="Inserisci una password di almeno 8 caratteri" required autocomplete="new-password"
                                maxlength="255" minlength="8"
                                >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-6">

                                <label for="password-confirm" class="col-form-label text-md-right required-input">Conferma Nuova Password</label>
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror"
                                name="password_confirmation" placeholder="Inserisci nuovamente la tua password" required autocomplete="new-password"
                                maxlength="255" minlength="8"
                                >

                            </div>

                        </div>
                                                

                        {{-- restaurant form --}}
                        <h3>Dati attività</h3>
                        <div class="mb-4 row">

                            <div class="col-12 mb-4">

                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right required-input">Nome Ristorante</label>
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" 
                                name="restaurant_name" value="{{ old('restaurant_name') }}" placeholder="eg. Pizzeria da Mario" required autocomplete="restaurant_name" autofocus
                                maxlength="100"
                                >
    
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-12 mb-2">

                                <label for="img" class="form-label required-input">Immagine</label>
                                <input type="file" class="form-control" id="url" name="img" value="">
                                @error('img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="mb-2 row">
                            <label class="form-label required-input">Categorie</label>
                            <ul class="d-flex flex-wrap gap-2">

                                @foreach ($category_ids as $category)
                                    <div class="form-check">
                                        <input 
                                        class="form-check-input" type="checkbox" value="{{ $category->id }}" id="{{ $category->id }}" name="categories[]"
                                        @checked( in_array($category->id, old('categories', [])) )
                                        >
                                        <label class="form-check-label" for="{{ $category->id }}" name="categories[]">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </ul>
                        </div>

                        <div class="mb-4 row">

                            <div class="col-6">

                                <label for="address" class="col-md-4 col-form-label text-md-right required-input">Indirizzo</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" placeholder="eg. Via del Mario, 15" required autocomplete="name" autofocus
                                maxlength="255"
                                >
    
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-6">

                                <label for="vat" class="col-md-4 col-form-label text-md-right required-input">P.IVA</label>
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror"
                                name="vat" value="{{ old('vat') }}" placeholder="eg. 12345678900" required autocomplete="vat"
                                maxlength="13" minlength="13"
                                >
        
                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                        </div>


                        <div class="mb-4 row">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
