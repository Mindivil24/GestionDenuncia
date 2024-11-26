<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Denuncias')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('complaints.index') }}">Denuncias</a></li>
                <li><a href="{{ route('evaluations.index') }}">Evaluaciones</a></li>
                <li><a href="{{ route('auditlogs.index') }}">Registro de Auditoría</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2024 - Gestión de Denuncias</p>
    </footer>
</body>
</html>