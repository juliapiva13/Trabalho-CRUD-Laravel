<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Veiculo extends Model
{
    protected $fillable = [
        'marca_id',
        'modelo_id',
        'cor_id',
        'ano_fabricacao',
        'quilometragem',
        'valor',
        'descricao',
        'foto_principal',
        'foto_2',
        'foto_3',
        'foto_4',
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cor(): BelongsTo
    {
        return $this->belongsTo(Cor::class);
    }
}
