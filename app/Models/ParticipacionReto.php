<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Reto;

class ParticipacionReto extends Model
{
    use HasFactory;

    protected $table = 'participaciones_reto';
    protected $primaryKey = 'participacion_id';

    protected $fillable = [
        'usuario_id',
        'reto_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'progreso',
        'notas'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function reto(): BelongsTo
    {
        return $this->belongsTo(Reto::class, 'reto_id');
    }
}
