@extends('layouts.app')

@section('content')
<div class="container">


    siamo dentro INDEX, caro il nostro bel {{ $user->name }}


    <a href="{{ route('dishes.create')}}" class="btn btn-primary m-3">create</a>
    {{-- <a href="{{ route('dishes.edit')}}" class="btn btn-primary m-3">edit</a> --}}


</div>
@endsection