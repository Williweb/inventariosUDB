<div class="p-5 border-b border-gray-100">
    <h1 class="text-base font-semibold text-gray-800">Inventarios UDB</h1>
    <p class="text-xs text-gray-400 mt-0.5">Sistema de inventario</p>
</div>

<nav class="flex-1 p-4 space-y-1">

    <a href="/dashboard"
       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
              {{ request()->is('dashboard') ? 'bg-orange-50 text-orange-600' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-house w-4 text-center"></i>
        Dashboard
    </a>

    <a href="/productos"
       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
              {{ request()->is('productos*') ? 'bg-orange-50 text-orange-600' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-box w-4 text-center"></i>
        Productos
    </a>

    @if(session('rol') === 'Administrador')
    <a href="/usuarios"
       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
              {{ request()->is('usuarios*') ? 'bg-orange-50 text-orange-600' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-users w-4 text-center"></i>
        Usuarios
    </a>

    <a href="/entradas"
       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
              {{ request()->is('entradas*') ? 'bg-orange-50 text-orange-600' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-arrow-down w-4 text-center"></i>
        Entradas
    </a>

    <a href="/salidas"
       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
              {{ request()->is('salidas*') ? 'bg-orange-50 text-orange-600' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-arrow-up w-4 text-center"></i>
        Salidas
    </a>
    @endif

</nav>

<div class="p-4 border-t border-gray-100">
    <div class="flex items-center gap-3 mb-3">
        <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold">
            {{ strtoupper(substr(session('nombre', 'U'), 0, 1)) }}
        </div>
        <div class="min-w-0">
            <p class="text-sm font-medium text-gray-800 truncate">{{ session('nombre') }} {{ session('apellido') }}</p>
            <p class="text-xs text-gray-400 truncate">{{ session('correo') }}</p>
        </div>
    </div>
    <form method="POST" action="/logout">
        @csrf
        <button type="submit"
                class="w-full flex items-center gap-2 px-3 py-2 rounded-xl text-sm text-gray-500 hover:bg-gray-50 transition">
            <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
            Cerrar sesión
        </button>
    </form>
</div>
