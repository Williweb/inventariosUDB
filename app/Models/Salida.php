<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = 'salidas';

    protected $fillable = [
        'id_usuario', 'id_producto', 'cantidad',
        'motivo', 'descripcion', 'fecha',
    ];

    protected $casts = ['fecha' => 'date'];

    const MOTIVOS = ['Venta', 'Merma', 'Devolución', 'Ajuste', 'Otro'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
