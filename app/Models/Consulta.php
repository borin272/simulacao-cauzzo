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
        'motivo',
        'anotacoes',
    ];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id');
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
