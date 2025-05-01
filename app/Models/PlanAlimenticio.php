<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Comida;

class PlanAlimenticio extends Model
{
    use HasFactory;

    protected $table = 'planes_alimenticios';
    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'fecha_creacion',
        'calorias_objetivo',
        'proteinas_objetivo',
        'carbohidratos_objetivo',
        'grasas_objetivo',
        'activo'
    ];

    protected $casts = [
        'fecha_creacion' => 'date',
        'calorias_objetivo' => 'integer',
        'proteinas_objetivo' => 'integer',
        'carbohidratos_objetivo' => 'integer',
        'grasas_objetivo' => 'integer',
        'activo' => 'boolean'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function comidas(): HasMany
    {
        return $this->hasMany(Comida::class, 'plan_id');
    }
}
