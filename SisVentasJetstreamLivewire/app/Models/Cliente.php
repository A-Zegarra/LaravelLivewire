<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'razon_social', 'tipo_documento', 'nro_documento', 'correo', 'telefono', 'pais', 'ciudad', 'nacimiento', 'foto'];
    protected $guarded = [];
}
