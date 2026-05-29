<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';

    protected $fillable = [
        'id_usuario', 'id_producto', 'cantidad',
        'precio_unitario', 'proveedor', 'descripcion', 'fecha',
    ];

    protected $casts = ['fecha' => 'date'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
