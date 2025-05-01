<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class FotoProgreso extends Model
{
    use HasFactory;

    protected $table = 'fotos_progreso';
    protected $primaryKey = 'foto_id';

    protected $fillable = [
        'usuario_id',
        'fecha',
        'url_imagen',
        'tipo',
        'notas'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
