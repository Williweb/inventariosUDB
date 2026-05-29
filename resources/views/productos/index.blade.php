@extends('layouts.app')

@section('title', 'Productos — Inventarios UDB')

@section('page-title', 'Productos')
@section('page-subtitle', 'Gestión de productos')

@section('header-action')
    <a href="/productos/create"
       class="text-sm bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl transition">
        + Nuevo producto
    </a>
@endsection

@section('content')

@if(session('exito'))
<div class="mb-5 px-4 py-3 rounded-xl bg-green-50 text-green-700 border border-green-200 text-sm flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    {{ session('exito') }}
</div>
@endif

@if($errors->any())
<div class="mb-5 px-4 py-3 rounded-xl bg-red-50 text-red-700 border border-red-200 text-sm">
    <div class="flex items-center gap-2 font-medium mb-1"><i class="fa-solid fa-circle-exclamation"></i> Error</div>
    <ul class="list-disc list-inside space-y-0.5">
        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul>
</div>
@endif

<div class="bg-white rounded-2xl border border-gray-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Imagen</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Código</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Descripción</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Precio</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($productos as $producto)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" alt="{{ $producto->descripcion }}"
                                 class="w-10 h-10 rounded-lg object-cover">
                        @else
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                <i class="fa-solid fa-box text-xs"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $producto->barra }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">{{ $producto->descripcion }}</td>
                    <td class="px-5 py-3 text-gray-700">${{ number_format($producto->precio, 2) }}</td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2 justify-end">
                            <a href="/productos/{{ $producto->id }}/edit"
                               class="text-xs text-gray-500 hover:text-orange-600 px-3 py-1.5 rounded-lg border border-gray-200 hover:border-orange-200 transition">
                                Editar
                            </a>
                            <form method="POST" action="/productos/{{ $producto->id }}"
                                  onsubmit="return confirm('¿Eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-xs text-red-500 hover:text-red-700 px-3 py-1.5 rounded-lg border border-red-100 hover:border-red-300 transition">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-gray-400 text-sm">
                        Sin productos registrados.
                        <a href="/productos/create" class="text-orange-500 hover:underline ml-1">Agregar uno</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
