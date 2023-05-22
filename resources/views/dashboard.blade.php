@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Ciao, benevenuto {{ Auth::user()->name }}
    </h2>
    
    <div class="d-flex flex-column gap-3">
        <div class="col p-2 text-white rounded-2 bg-primary">
            <a href="{{ route('dishes.index')}}" class="text-white">Vai ai tuoi piatti</a> 
        </div>
        <div class="col p-2 text-white rounded-2 bg-primary">
            Vai ai tuoi ordini
        </div>
    </div>


</div>
@endsection
