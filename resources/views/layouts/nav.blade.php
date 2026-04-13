<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-car-front"></i> Concessionária
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-house-door"></i> Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('carros*') ? 'active' : '' }}" href="{{ route('carros.index') }}">
                        <i class="fa fa-car"></i> Carros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('carros/create') ? 'active' : '' }}" href="{{ route('carros.create') }}">
                        <i class="bi bi-plus-circle"></i> Cadastrar carro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>