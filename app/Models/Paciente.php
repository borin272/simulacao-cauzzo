<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Paciente extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'cpf',
        'telefone',
        'endereco',
        'data_nascimento',
        'convenio',
        'observacoes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function anexos()
    {
        return $this->media()->where('collection_name', 'anexos');
    }
}
