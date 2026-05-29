<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Producto;
use Illuminate\Http\Request;

class SalidaController
{
    public function index()
    {
        $salidas = Salida::with('producto')
            ->where('id_usuario', session('usuario'))
            ->orderBy('fecha', 'desc')
            ->get();

        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        $productos = Producto::orderBy('descripcion')->get()
            ->filter(fn($p) => $p->stock_actual > 0)
            ->values();

        return view('salidas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
            'motivo'      => 'required|in:Venta,Merma,Devolución,Ajuste,Otro',
            'descripcion' => 'nullable|string|max:255',
            'fecha'       => 'required|date',
        ]);

        $producto = Producto::findOrFail($request->id_producto);

        if ($request->cantidad > $producto->stock_actual) {
            return back()->withErrors(['cantidad' => 'La cantidad supera el stock disponible (' . $producto->stock_actual . ' unidades.']);
        }

        Salida::create([
            'id_usuario'  => session('usuario'),
            'id_producto' => $request->id_producto,
            'cantidad'    => $request->cantidad,
            'motivo'      => $request->motivo,
            'descripcion' => $request->descripcion,
            'fecha'       => $request->fecha,
        ]);

        return redirect('/salidas')->with('exito', 'Salida registrada correctamente.');
    }

    public function edit(Salida $salida)
    {
        $productos = Producto::orderBy('descripcion')->get();

        return view('salidas.edit', compact('salida', 'productos'));
    }

    public function update(Request $request, Salida $salida)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
            'motivo'      => 'required|in:Venta,Merma,Devolución,Ajuste,Otro',
            'descripcion' => 'nullable|string|max:255',
            'fecha'       => 'required|date',
        ]);

        $producto = Producto::findOrFail($request->id_producto);
        $stockDisponible = $producto->stock_actual + $salida->cantidad;

        if ($request->cantidad > $stockDisponible) {
            return back()->withErrors(['cantidad' => 'La cantidad supera el stock disponible (' . $stockDisponible . ' unidades).']);
        }

        $salida->update([
            'id_producto' => $request->id_producto,
            'cantidad'    => $request->cantidad,
            'motivo'      => $request->motivo,
            'descripcion' => $request->descripcion,
            'fecha'       => $request->fecha,
        ]);

        return redirect('/salidas')->with('exito', 'Salida actualizada correctamente.');
    }

    public function destroy(Salida $salida)
    {
        $salida->delete();

        return redirect('/salidas')->with('exito', 'Salida eliminada correctamente.');
    }
}
