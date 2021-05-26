<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = 'id';

    public $fillable = [
        'categoria_id',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];

    protected $guarded = [
        
    ];
    //use HasFactory;
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalle_articulo()
    {
        return $this->hasMany(Detalle_ingreso::class);
    }

    public function detalle_venta()
    {
        return $this->hasMany(Detalle_Venta::class);
    }
}
