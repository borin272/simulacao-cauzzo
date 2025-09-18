<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescricao extends Model
{
    protected $fillable = [
        'consulta_id',
        'medicamento',
        'posologia',
        'observacoes',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
