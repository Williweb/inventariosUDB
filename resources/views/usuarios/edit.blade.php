@extends('layouts.app')

@section('title', 'Editar usuario — Inventarios UDB')

@section('page-title', 'Editar usuario')
@section('page-subtitle'){{ $usuario->nombre }} {{ $usuario->apellido }}@endsection

@section('content')

<div class="max-w-lg">

    @if($errors->any())
    <div class="mb-5 px-4 py-3 rounded-xl bg-red-50 text-red-700 border border-red-200 text-sm">
        <div class="flex items-center gap-2 font-medium mb-1"><i class="fa-solid fa-circle-exclamation"></i> Error</div>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <form method="POST" action="/usuarios/{{ $usuario->id }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required maxlength="100"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="Nombre">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" required maxlength="100"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="Apellido">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Correo</label>
                <input type="email" name="correo" value="{{ old('correo', $usuario->correo) }}" required maxlength="255"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="correo@ejemplo.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Rol</label>
                <select name="rol" required
                        class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition bg-white">
                    <option value="Usuario" {{ old('rol', $usuario->rol) === 'Usuario' ? 'selected' : '' }}>Usuario</option>
                    <option value="Administrador" {{ old('rol', $usuario->rol) === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Nueva contraseña <span class="text-gray-400 font-normal">(dejar en blanco para no cambiar)</span>
                </label>
                <input type="password" name="clave" maxlength="255"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="Mínimo 6 caracteres">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-5 py-2.5 rounded-xl text-sm transition">
                    Guardar cambios
                </button>
                <a href="/usuarios" class="text-sm text-gray-500 hover:text-gray-700 transition">Cancelar</a>
            </div>

        </form>
    </div>

</div>

@endsection
