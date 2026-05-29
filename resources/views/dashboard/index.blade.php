@extends('layouts.app')

@section('title', 'Dashboard — Inventarios UDB')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen del inventario')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total productos</p>
        <p class="text-3xl font-semibold text-gray-800 mt-1">{{ $totalProductos }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Entradas este mes</p>
        <p class="text-3xl font-semibold text-green-600 mt-1">+{{ $entradasDelMes }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Salidas este mes</p>
        <p class="text-3xl font-semibold text-red-500 mt-1">-{{ $salidasDelMes }}</p>
    </div>

</div>

<div class="bg-white rounded-2xl border border-gray-100">
    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
        <h3 class="text-sm font-semibold text-gray-800">Productos</h3>
        <a href="/productos/create"
           class="text-xs bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-lg transition">
            + Nuevo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Código</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Descripción</th>
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Precio</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($productos as $producto)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-500">{{ $producto->barra }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">{{ $producto->descripcion }}</td>
                    <td class="px-5 py-3 text-gray-700">${{ number_format($producto->precio, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-5 py-8 text-center text-gray-400 text-sm">
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
