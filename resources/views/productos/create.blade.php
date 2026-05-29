@extends('layouts.app')

@section('title', 'Nuevo producto — Inventarios UDB')

@section('page-title', 'Nuevo producto')
@section('page-subtitle', 'Agregar producto al inventario')

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
        <form method="POST" action="/productos" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Código de barra</label>
                <input type="number" name="barra" value="{{ old('barra') }}" required
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="1234567890">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" required maxlength="255"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="Nombre del producto">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Precio</label>
                <input type="number" name="precio" value="{{ old('precio') }}" required min="0" step="0.01"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="0.00">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">URL de imagen <span class="text-gray-400 font-normal">(opcional)</span></label>
                <input type="url" name="imagen" value="{{ old('imagen') }}" maxlength="500"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="https://...">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-5 py-2.5 rounded-xl text-sm transition">
                    Guardar producto
                </button>
                <a href="/productos" class="text-sm text-gray-500 hover:text-gray-700 transition">Cancelar</a>
            </div>

        </form>
    </div>

</div>

@endsection
