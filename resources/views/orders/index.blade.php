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
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Codice postale</th>
            <th scope="col">Orario</th>
            <th scope="col">Totale</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
    </table>
@endsection