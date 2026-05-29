@extends('layouts.app')

@section('title', 'Nueva salida — Inventarios UDB')
@section('page-title', 'Nueva salida')
@section('page-subtitle', 'Registrar salida de inventario')

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
        <form method="POST" action="/salidas" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Producto</label>
                <select name="id_producto" required
                        class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    <option value="">Seleccionar producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" data-stock="{{ $producto->stock_actual }}"
                                {{ old('id_producto') == $producto->id ? 'selected' : '' }}>
                            {{ $producto->descripcion }} (Stock: {{ $producto->stock_actual }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Cantidad</label>
                <input type="number" name="cantidad" value="{{ old('cantidad') }}" required min="1"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="0">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Motivo</label>
                <select name="motivo" required
                        class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    <option value="">Seleccionar motivo</option>
                    @foreach(\App\Models\Salida::MOTIVOS as $motivo)
                        <option value="{{ $motivo }}" {{ old('motivo') == $motivo ? 'selected' : '' }}>{{ $motivo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción <span class="text-gray-400 font-normal">(opcional)</span></label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" maxlength="255"
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition"
                       placeholder="Nota adicional">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Fecha</label>
                <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required
                       class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-sm outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-5 py-2.5 rounded-xl text-sm transition">
                    Guardar salida
                </button>
                <a href="/salidas" class="text-sm text-gray-500 hover:text-gray-700 transition">Cancelar</a>
            </div>

        </form>
    </div>

</div>

@endsection
