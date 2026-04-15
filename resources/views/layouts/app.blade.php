<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('layouts.head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">

    @include('layouts.nav')

    <div class="container mt-4 flex-grow-1">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>