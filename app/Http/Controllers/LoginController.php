<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !password_verify($request->clave, $usuario->clave)) {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }

        session([
            'usuario'  => $usuario->id,
            'nombre'   => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'correo'   => $usuario->correo,
            'rol'      => $usuario->rol,
        ]);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
