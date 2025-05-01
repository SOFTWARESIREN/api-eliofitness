<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comida extends Model
{
    use HasFactory;

    protected $table = 'comidas';
    protected $primaryKey = 'comida_id';

    protected $fillable = [
        'plan_id',
        'nombre',
        'hora'
    ];

    protected $casts = [
        'hora' => 'datetime'
    ];

    public function planAlimenticio(): BelongsTo
    {
        return $this->belongsTo(PlanAlimenticio::class, 'plan_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleComida::class, 'comida_id');
    }
}
