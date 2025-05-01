<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membresia extends Model
{
    use HasFactory;

    protected $table = 'membresias';
    protected $primaryKey = 'membresia_id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_mensual',
        'precio_trimestral',
        'precio_anual',
        'beneficios',
        'activa'
    ];

    protected $casts = [
        'precio_mensual' => 'decimal:2',
        'precio_trimestral' => 'decimal:2',
        'precio_anual' => 'decimal:2',
        'activa' => 'boolean'
    ];

    public function suscripciones(): HasMany
    {
        return $this->hasMany(SuscripcionUsuario::class, 'membresia_id');
    }
}
