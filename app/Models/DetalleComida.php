<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleComida extends Model
{
    use HasFactory;

    protected $table = 'detalle_comidas';
    protected $primaryKey = 'detalle_id';

    protected $fillable = [
        'comida_id',
        'alimento_id',
        'cantidad',
        'unidad'
    ];

    protected $casts = [
        'cantidad' => 'decimal:2'
    ];

    public function comida(): BelongsTo
    {
        return $this->belongsTo(Comida::class, 'comida_id');
    }

    public function alimento(): BelongsTo
    {
        return $this->belongsTo(Alimento::class, 'alimento_id');
    }
}
