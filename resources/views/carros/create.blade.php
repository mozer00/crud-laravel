<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.nav')
    <div class="container mt-4">

        <h2>Novo Carro</h2>

        <form action="{{ route('carros.store') }}" method="POST">
            @csrf

            <!-- Marca -->
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>

            <!-- Modelo -->
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <!-- Ano -->
            <div class="mb-3">
                <label class="form-label">Ano</label>
                <input type="number" name="ano" class="form-control" required>
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-success">
                Adicionar
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