<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiaRutina extends Model
{
    use HasFactory;

    protected $table = 'dias_rutina';
    protected $primaryKey = 'dia_id';

    protected $fillable = [
        'rutina_id',
        'nombre',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    public function rutina(): BelongsTo
    {
        return $this->belongsTo(Rutina::class, 'rutina_id');
    }

    public function ejercicios(): HasMany
    {
        return $this->hasMany(EjercicioRutina::class, 'dia_id');
    }
}
