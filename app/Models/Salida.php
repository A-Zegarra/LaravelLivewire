<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    protected $fillable = ['id_producto', 'cantidad'];
    protected $guarded = [];

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
