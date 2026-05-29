@extends('layouts.app')

@section('title', 'Salidas — Inventarios UDB')
@section('page-title', 'Salidas')
@section('page-subtitle', 'Registro de salidas de inventario')

@section('header-action')
    <a href="/salidas/create"
       class="text-sm bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl transition">
        + Nueva salida
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
                    <th class="text-left px-5 py-3 text-xs font-medium text-gray-400">Motivo</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($salidas as $salida)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-500">{{ $salida->fecha->format('d/m/Y') }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">{{ $salida->producto->descripcion }}</td>
                    <td class="px-5 py-3"><span class="text-red-500 font-semibold">-{{ $salida->cantidad }}</span></td>
                    <td class="px-5 py-3">
                        <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-600 text-xs">{{ $salida->motivo }}</span>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2 justify-end">
                            <a href="/salidas/{{ $salida->id }}/edit"
                               class="text-xs text-gray-500 hover:text-orange-600 px-3 py-1.5 rounded-lg border border-gray-200 hover:border-orange-200 transition">
                                Editar
                            </a>
                            <form method="POST" action="/salidas/{{ $salida->id }}"
                                  onsubmit="return confirm('¿Eliminar esta salida?')">
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
                        Sin salidas registradas.
                        <a href="/salidas/create" class="text-orange-500 hover:underline ml-1">Registrar una</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
