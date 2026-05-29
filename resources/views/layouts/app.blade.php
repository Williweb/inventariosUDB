<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventarios UDB')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100" style="font-family: 'DM Sans', sans-serif;">

    <div class="flex min-h-screen max-w-screen-2xl mx-auto">

        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0">
            @include('layouts.aside')
        </aside>

        <div class="flex flex-col flex-1">
            @include('layouts.header')
            <main class="flex-1 bg-gray-50 p-6">
                @yield('content')
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>
