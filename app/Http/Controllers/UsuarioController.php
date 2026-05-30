<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController
{
    public function index()
    {
        $usuarios = Usuario::orderBy('apellido')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email|max:255|unique:usuarios,correo',
            'rol'      => 'required|in:Administrador,Usuario',
            'clave'    => 'required|string|min:6|max:255',
        ]);

        Usuario::create([
            'nombre'   => $request->nombre,
            'apellido' => $request->apellido,
            'correo'   => $request->correo,
            'rol'      => $request->rol,
            'clave'    => password_hash($request->clave, PASSWORD_DEFAULT),
        ]);

        return redirect('/usuarios')->with('exito', 'Usuario creado correctamente.');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email|max:255|unique:usuarios,correo,' . $usuario->id,
            'rol'      => 'required|in:Administrador,Usuario',
            'clave'    => 'nullable|string|min:6|max:255',
        ]);

        $datos = [
            'nombre'   => $request->nombre,
            'apellido' => $request->apellido,
            'correo'   => $request->correo,
            'rol'      => $request->rol,
        ];

        if ($request->filled('clave')) {
            $datos['clave'] = password_hash($request->clave, PASSWORD_DEFAULT);
        }

        $usuario->update($datos);

        return redirect('/usuarios')->with('exito', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect('/usuarios')->with('exito', 'Usuario eliminado correctamente.');
    }
}
