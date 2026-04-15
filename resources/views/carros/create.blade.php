@extends('layouts.app')

@section('content')

<h2 class="mb-4">Cadastrar Carro</h2>

<form action="{{ route('carros.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input
            type="text"
            name="marca"            
            value="{{ old('marca') }}"
            class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}"
        >
        @error('marca')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input
            type="text"
            name="modelo"
            value="{{ old('modelo') }}"
            class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}"
        >
        @error('modelo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input
            type="number"
            name="ano"
            value="{{ old('ano') }}"
            class="form-control {{ $errors->has('ano') ? 'is-invalid' : '' }}"
        >
        @error('ano')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>

    <a href="{{ route('carros.index') }}" class="btn btn-secondary ms-2">Voltar</a>

</form>

@endsection