@extends('layouts.app')

@section('content')

<div id="app">
    <formulario-carro :carro='@json($carro)'></formulario-carro>
</div>

@endsection