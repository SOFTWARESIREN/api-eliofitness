<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reto extends Model
{
    use HasFactory;

    protected $table = 'retos';
    protected $primaryKey = 'reto_id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'objetivos',
        'reglas',
        'premios',
        'activo'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean'
    ];

    public function participaciones(): HasMany
    {
        return $this->hasMany(ParticipacionReto::class, 'reto_id');
    }
}
