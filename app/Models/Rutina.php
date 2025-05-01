<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\DiaRutina;
use App\Models\RegistroEntrenamiento;

class Rutina extends Model
{
    use HasFactory;

    protected $table = 'rutinas';
    protected $primaryKey = 'rutina_id';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'descripcion',
        'fecha_creacion',
        'nivel',
        'activa'
    ];

    protected $casts = [
        'fecha_creacion' => 'date',
        'activa' => 'boolean'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function dias(): HasMany
    {
        return $this->hasMany(DiaRutina::class, 'rutina_id');
    }

    public function registrosEntrenamiento(): HasMany
    {
        return $this->hasMany(RegistroEntrenamiento::class, 'rutina_id');
    }
}
