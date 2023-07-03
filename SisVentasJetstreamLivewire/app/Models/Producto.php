<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'descripcion', 'cantidad_caja', 'costo', 'precio_menor', 'precio_mayor', 'tipo_medida', 'foto', 'categoria_id'];
    protected $guarded = [];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
