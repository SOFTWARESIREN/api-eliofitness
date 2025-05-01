<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Empleado;

class SesionEntrenamiento extends Model
{
    use HasFactory;

    protected $table = 'sesiones_entrenamiento';
    protected $primaryKey = 'sesion_id';

    protected $fillable = [
        'usuario_id',
        'entrenador_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'tipo',
        'estado',
        'notas'
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora_inicio' => 'datetime',
        'hora_fin' => 'datetime'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function entrenador(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'entrenador_id');
    }
}
