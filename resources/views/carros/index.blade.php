@extends('layouts.app')

@section('content')

<div id="app">

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">
    Cadastrar carro
</a>

<tabela-carros :carros='@json($carros)'></tabela-carros>

</div>

@endsection