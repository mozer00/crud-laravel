@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <h2>Detalhes do Carro</h2>

        <div class="card">
            <div class="card-body">

                <p><strong>Marca:</strong> {{ $carro->marca }}</p>
                <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
                <p><strong>Ano:</strong> {{ $carro->ano }}</p>

                <a href="{{ route('carros.index') }}" class="btn btn-secondary">
                    Voltar
                </a>

                <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-warning">
                    Editar
                </a>

                <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection