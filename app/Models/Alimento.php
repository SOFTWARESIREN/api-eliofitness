<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alimento extends Model
{
    use HasFactory;

    protected $table = 'alimentos';
    protected $primaryKey = 'alimento_id';

    protected $fillable = [
        'nombre',
        'categoria',
        'calorias',
        'proteinas',
        'carbohidratos',
        'grasas',
        'fibra',
        'azucares',
        'sodio',
        'imagen_url'
    ];

    protected $casts = [
        'calorias' => 'integer',
        'proteinas' => 'decimal:2',
        'carbohidratos' => 'decimal:2',
        'grasas' => 'decimal:2',
        'fibra' => 'decimal:2',
        'azucares' => 'decimal:2',
        'sodio' => 'decimal:2'
    ];

    public function detallesComidas(): HasMany
    {
        return $this->hasMany(DetalleComida::class, 'alimento_id');
    }
}
