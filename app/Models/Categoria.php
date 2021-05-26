<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected  $primaryKey ='id';

    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'condicion'
    ];

    public function articulo()
    {
        return $this->hasMany(Articulo::class);
    }

    //use HasFactory;
}
