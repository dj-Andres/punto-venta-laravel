<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'idpersona';

    public $fillable = [
        'tipo_persona',
        'nombre',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email'
    ];

    public function ingreso()
    {
        return $this->hasMany(Ingreso::class);
    }
    public function venta()
    {
        return $this->hasMany(Venta::class);
    }
    //use HasFactory;
}
