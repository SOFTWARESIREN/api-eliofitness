<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class MedidaCorporal extends Model
{
    use HasFactory;

    protected $table = 'medidas_corporales';
    protected $primaryKey = 'medida_id';

    protected $fillable = [
        'usuario_id',
        'fecha',
        'peso',
        'porcentaje_grasa',
        'porcentaje_musculo',
        'imc',
        'circunferencia_cintura',
        'circunferencia_cadera',
        'circunferencia_brazos',
        'circunferencia_piernas',
        'notas'
    ];

    protected $casts = [
        'fecha' => 'date',
        'peso' => 'decimal:2',
        'porcentaje_grasa' => 'decimal:2',
        'porcentaje_musculo' => 'decimal:2',
        'imc' => 'decimal:2',
        'circunferencia_cintura' => 'decimal:2',
        'circunferencia_cadera' => 'decimal:2',
        'circunferencia_brazos' => 'decimal:2',
        'circunferencia_piernas' => 'decimal:2'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
