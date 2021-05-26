<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';

    protected $primaryKey = 'idingreso';

    public $fillable = [
        'proveedor_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'hora_fecha',
        'impuesto',
        'estado'
    ]; 
    //use HasFactory;
    public function proveedor(){
        return $this->belongsTo(Persona::class);
    }

    public function detalle_ingreso(){
        return $this->hasMany(Detalle_ingreso::class);
    }
}
