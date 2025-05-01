<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EjercicioRutina extends Model
{
    use HasFactory;

    protected $table = 'ejercicios_rutina';
    protected $primaryKey = 'ejercicio_rutina_id';

    protected $fillable = [
        'dia_id',
        'ejercicio_id',
        'sets',
        'repeticiones',
        'peso',
        'descanso',
        'orden',
        'notas'
    ];

    protected $casts = [
        'sets' => 'integer',
        'descanso' => 'integer',
        'orden' => 'integer'
    ];

    public function diaRutina(): BelongsTo
    {
        return $this->belongsTo(DiaRutina::class, 'dia_id');
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
}
