<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiPOS — Iniciar sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center" style="font-family: 'DM Sans', sans-serif;">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-800">Inventarios UDB</h1>
                <p class="text-sm text-gray-400 mt-1">Sistema de inventario</p>
            </div>

           

            @if(session('error'))
            <div class="mb-4 px-4 py-3 rounded-xl bg-red-50 text-red-600 border border-red-200 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="/login" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Correo electrónico</label>
                    <input type="email" name="correo" value="borja@ejemplo.com" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                           placeholder="correo@ejemplo.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Contraseña</label>
                    <input type="password" name="clave" value="password" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                           placeholder="••••••••">
                </div>

                <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2.5 rounded-xl text-sm transition-colors mt-2">
                    Iniciar sesión
                </button>
            </form>
        </div>
    </div>

</body>
</html>
