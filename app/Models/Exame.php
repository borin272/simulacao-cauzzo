<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Exame extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'consulta_id',
        'tipo',
        'status',
        'observacoes',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function arquivos()
    {
        return $this->media()->where('collection_name', 'arquivos');
    }
}
