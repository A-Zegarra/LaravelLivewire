<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $fillable = ['id_tipocomprobante', 'id_cliente','id_usuario','fecha','hora','total'];
    protected $guarded = [];

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
