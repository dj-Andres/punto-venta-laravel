<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_ingreso extends Model
{
    protected $table = 'detalle_ingresos';

    protected $primaryKey = 'iddetalle_ingreso';

    public $fillable = [
        'ingreso_id',
        'articulo_id',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];

    protected $guarded =[

    ];

    public function ingreso()
    {
        return $this->belongsTo(Ingreso::class);
    }
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }


    //use HasFactory;
}
