@extends('layouts.app')

@section('content')

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">
    Cadastrar carro
</a>

<div id="app">
    <tabela-carros :carros='@json($carros->items())'></tabela-carros>
</div>

<div class="mt-3">
    {{ $carros->links() }}
</div>

@endsection