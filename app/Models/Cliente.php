<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido','razonsocial','documento','telefono','correo','pais','ciudad'];
    protected $guarded = [];

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
