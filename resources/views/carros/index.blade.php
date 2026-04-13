<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')    
</head>
<body>
    @include('layouts.nav')    

<div class="container mt-4">

    <a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">
        Cadastrar carro
    </a>

    <table class="table table-striped table-bordered">
        
        <thead class="table-dark">
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th width="150">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carros as $carro)
            
                <tr>
                    <td>{{ $carro->marca }}</td>
                    <td>{{ $carro->modelo }}</td>
                    <td>{{ $carro->ano }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('carros.show', $carro->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('carros.destroy', $carro->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<footer></footer>
</body>
</html>