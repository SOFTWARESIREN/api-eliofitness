<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\HorarioEntrenador;
use App\Models\SesionEntrenamiento;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'empleado_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'puesto',
        'fecha_contratacion',
        'estado',
        'usuario_sistema_id'
    ];

    protected $casts = [
        'fecha_contratacion' => 'date'
    ];

    public function usuarioSistema(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_sistema_id');
    }

    public function horariosEntrenador(): HasMany
    {
        return $this->hasMany(HorarioEntrenador::class, 'empleado_id');
    }

    public function sesionesEntrenamiento(): HasMany
    {
        return $this->hasMany(SesionEntrenamiento::class, 'entrenador_id');
    }
}
