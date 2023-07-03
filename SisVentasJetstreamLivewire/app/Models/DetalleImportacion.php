<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleImportacion extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'costo_unitario', 'importacion_id', 'producto_id'];
    protected $guarded = [];

    public function importacion()
    {
        return $this->belongsTo(Importacion::class, 'importacion_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
