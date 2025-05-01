<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SuscripcionUsuario extends Model
{
    use HasFactory;

    protected $table = 'suscripciones_usuario';
    protected $primaryKey = 'suscripcion_id';

    protected $fillable = [
        'usuario_id',
        'membresia_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'precio_pagado',
        'periodo',
        'notas'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'precio_pagado' => 'decimal:2'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function membresia(): BelongsTo
    {
        return $this->belongsTo(Membresia::class, 'membresia_id');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'suscripcion_id');
    }
}
