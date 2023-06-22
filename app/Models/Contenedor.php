<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha', 'yuan', 'dolar', 'gasto1', 'gasto2', 'gasto3', 'gasto4'];
    protected $guarded = [];

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/
    protected $table = "contenedores";
}
