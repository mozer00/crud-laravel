<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.nav')
    <div class="container mt-4">

        <h2>Editar Carro</h2>

        <form action="{{ route('carros.update', $carro->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input 
                    type="text" 
                    name="marca" 
                    class="form-control" 
                    value="{{ $carro->marca }}" 
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input 
                    type="text" 
                    name="modelo" 
                    class="form-control" 
                    value="{{ $carro->modelo }}" 
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Ano</label>
                <input 
                    type="number" 
                    name="ano" 
                    class="form-control" 
                    value="{{ $carro->ano }}" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-success">
                Atualizar
            </button>

            <a href="{{ route('carros.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </form>

    </div>
<footer>
</footer>
</body>
</html>