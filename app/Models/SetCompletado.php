<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SetCompletado extends Model
{
    use HasFactory;

    protected $table = 'sets_completados';
    protected $primaryKey = 'set_id';

    protected $fillable = [
        'registro_id',
        'ejercicio_id',
        'numero_set',
        'repeticiones',
        'peso',
        'duracion_segundos',
        'notas'
    ];

    protected $casts = [
        'numero_set' => 'integer',
        'repeticiones' => 'integer',
        'peso' => 'decimal:2',
        'duracion_segundos' => 'integer'
    ];

    public function registroEntrenamiento(): BelongsTo
    {
        return $this->belongsTo(RegistroEntrenamiento::class, 'registro_id');
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
}
