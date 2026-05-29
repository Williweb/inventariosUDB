@extends('layouts.app')

@section('title', 'Entradas — Inventarios UDB')
@section('page-title', 'Entradas')
@section('page-subtitle', 'Registro de entradas de inventario')

@section('header-action')
    <a href="/entradas/create"
       class="text-sm bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl transition">
        + Nueva entrada
    </a>
@endsection

@section('content')

@if(session('exito'))
<div class="mb-5 px-4 py-3 rounded-xl bg-green-50 text-green-700 border border-green-200 text-sm flex items-center gap-2">
    <i class="fa-solid fa-circle-check"></i>
    {{ session('exito') }}
</div>
@endif

<div class="bg-white rounded-2xl border border-gray-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Fecha</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Producto</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Cantidad</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Precio unitario</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Proveedor</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($entradas as $entrada)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-500">{{ $entrada->fecha->format('d/m/Y') }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">{{ $entrada->producto->descripcion }}</td>
                    <td class="px-5 py-3"><span class="text-green-600 font-semibold">+{{ $entrada->cantidad }}</span></td>
                    <td class="px-5 py-3 text-gray-700">${{ number_format($entrada->precio_unitario, 2) }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $entrada->proveedor }}</td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2 justify-end">
                            <a href="/entradas/{{ $entrada->id }}/edit"
                               class="text-xs text-gray-500 hover:text-orange-600 px-3 py-1.5 rounded-lg border border-gray-200 hover:border-orange-200 transition">
                                Editar
                            </a>
                            <form method="POST" action="/entradas/{{ $entrada->id }}"
                                  onsubmit="return confirm('¿Eliminar esta entrada?')">
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
                    <td colspan="6" class="px-5 py-10 text-center text-gray-400 text-sm">
                        Sin entradas registradas.
                        <a href="/entradas/create" class="text-orange-500 hover:underline ml-1">Registrar una</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
