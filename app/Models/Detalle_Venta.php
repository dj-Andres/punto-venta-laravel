<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    protected $table = 'detalle__ventas';

    protected $primaryKey = 'iddetalle_venta';

    public $fillable = [
        'venta_id',
        'articulo_id',
        'cantidad',
        'precio_venta',
        'descuento'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    //use HasFactory;
}
