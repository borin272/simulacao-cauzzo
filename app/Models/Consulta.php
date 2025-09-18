<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data_consulta',
        'status',
        'anotacoes',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function prescricoes()
    {
        return $this->hasMany(Prescricao::class);
    }

    public function exames()
    {
        return $this->hasMany(Exame::class);
    }
}
