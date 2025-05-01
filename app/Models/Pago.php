<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\SuscripcionUsuario;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'pago_id';

    protected $fillable = [
        'usuario_id',
        'suscripcion_id',
        'monto',
        'metodo_pago',
        'referencia',
        'estado',
        'notas'
    ];

    protected $casts = [
        'monto' => 'decimal:2'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function suscripcion(): BelongsTo
    {
        return $this->belongsTo(SuscripcionUsuario::class, 'suscripcion_id');
    }
}
