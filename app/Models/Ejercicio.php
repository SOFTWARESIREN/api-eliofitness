<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';
    protected $primaryKey = 'ejercicio_id';

    protected $fillable = [
        'nombre',
        'categoria',
        'grupo_muscular',
        'nivel_dificultad',
        'descripcion',
        'instrucciones',
        'video_url',
        'imagen_url'
    ];

    public function ejerciciosRutina(): HasMany
    {
        return $this->hasMany(EjercicioRutina::class, 'ejercicio_id');
    }

    public function setsCompletados(): HasMany
    {
        return $this->hasMany(SetCompletado::class, 'ejercicio_id');
    }
}
