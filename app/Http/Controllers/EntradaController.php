<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Http\Request;

class EntradaController
{
    public function index()
    {
        $entradas = Entrada::with('producto')
            ->where('id_usuario', session('usuario'))
            ->orderBy('fecha', 'desc')
            ->get();

        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $productos = Producto::orderBy('descripcion')->get();

        return view('entradas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto'    => 'required|exists:productos,id',
            'cantidad'       => 'required|integer|min:1',
            'precio_unitario'=> 'required|numeric|min:0',
            'proveedor'      => 'required|string|max:150',
            'descripcion'    => 'nullable|string|max:255',
            'fecha'          => 'required|date',
        ]);

        Entrada::create([
            'id_usuario'      => session('usuario'),
            'id_producto'     => $request->id_producto,
            'cantidad'        => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'proveedor'       => $request->proveedor,
            'descripcion'     => $request->descripcion,
            'fecha'           => $request->fecha,
        ]);

        return redirect('/entradas')->with('exito', 'Entrada registrada correctamente.');
    }

    public function edit(Entrada $entrada)
    {
        $productos = Producto::orderBy('descripcion')->get();

        return view('entradas.edit', compact('entrada', 'productos'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'id_producto'    => 'required|exists:productos,id',
            'cantidad'       => 'required|integer|min:1',
            'precio_unitario'=> 'required|numeric|min:0',
            'proveedor'      => 'required|string|max:150',
            'descripcion'    => 'nullable|string|max:255',
            'fecha'          => 'required|date',
        ]);

        $entrada->update([
            'id_producto'     => $request->id_producto,
            'cantidad'        => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'proveedor'       => $request->proveedor,
            'descripcion'     => $request->descripcion,
            'fecha'           => $request->fecha,
        ]);

        return redirect('/entradas')->with('exito', 'Entrada actualizada correctamente.');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();

        return redirect('/entradas')->with('exito', 'Entrada eliminada correctamente.');
    }
}
