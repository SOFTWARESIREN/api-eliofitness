<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistroEntrenamiento extends Model
{
    use HasFactory;

    protected $table = 'registros_entrenamiento';
    protected $primaryKey = 'registro_id';

    protected $fillable = [
        'usuario_id',
        'rutina_id',
        'dia_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'notas',
        'valoracion'
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora_inicio' => 'datetime',
        'hora_fin' => 'datetime',
        'valoracion' => 'integer'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function rutina(): BelongsTo
    {
        return $this->belongsTo(Rutina::class, 'rutina_id');
    }

    public function diaRutina(): BelongsTo
    {
        return $this->belongsTo(DiaRutina::class, 'dia_id');
    }

    public function setsCompletados(): HasMany
    {
        return $this->hasMany(SetCompletado::class, 'registro_id');
    }
}
