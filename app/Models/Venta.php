<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $primaryKey = 'idventa';

    public $fillable = [
        'cliente_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Persona::class);
    }

    public function detalle_venta(){
        return $this->hasMany(Detalle_Venta::class);
    }

    //use HasFactory;
}
