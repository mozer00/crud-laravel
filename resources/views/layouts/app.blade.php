<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('layouts.head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.nav')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>