<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteElectronico extends Model
{
    use HasFactory;
    protected $fillable = ['serie', 'numero', 'fecha_emision', 'estado', 'venta_id'];
    protected $guarded = [];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

}
