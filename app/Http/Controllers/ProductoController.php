<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController
{
    public function index()
    {
        $productos = Producto::orderBy('descripcion')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'barra'       => 'required|string|max:20|unique:productos,barra',
            'descripcion' => 'required|string|max:255',
            'precio'      => 'required|numeric|min:0',
            'imagen'      => 'nullable|url|max:500',
        ]);

        Producto::create([
            'barra'       => $request->barra,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio,
            'imagen'      => $request->imagen,
        ]);

        return redirect('/productos')->with('exito', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'barra'       => 'required|string|max:20|unique:productos,barra,' . $producto->id,
            'descripcion' => 'required|string|max:255',
            'precio'      => 'required|numeric|min:0',
            'imagen'      => 'nullable|url|max:500',
        ]);

        $producto->update([
            'barra'       => $request->barra,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio,
            'imagen'      => $request->imagen,
        ]);

        return redirect('/productos')->with('exito', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect('/productos')->with('exito', 'Producto eliminado correctamente.');
    }
}
