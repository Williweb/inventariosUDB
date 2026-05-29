<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['barra', 'descripcion', 'precio', 'imagen'];

    protected $casts = ['precio' => 'decimal:2'];

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'id_producto');
    }

    public function salidas()
    {
        return $this->hasMany(Salida::class, 'id_producto');
    }

    public function getStockActualAttribute(): int
    {
        return (int) ($this->entradas()->sum('cantidad') - $this->salidas()->sum('cantidad'));
    }
}
