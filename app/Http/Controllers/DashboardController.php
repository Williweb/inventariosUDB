<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Support\Carbon;

class DashboardController
{
    public function index()
    {
        $mes = Carbon::now()->month;
        $anio = Carbon::now()->year;

        $totalProductos    = Producto::count();
        $entradasDelMes    = Entrada::whereMonth('fecha', $mes)->whereYear('fecha', $anio)->sum('cantidad');
        $salidasDelMes     = Salida::whereMonth('fecha', $mes)->whereYear('fecha', $anio)->sum('cantidad');
        $productos         = Producto::orderBy('descripcion')->get();

        return view('dashboard.index', compact('totalProductos', 'entradasDelMes', 'salidasDelMes', 'productos'));
    }
}
