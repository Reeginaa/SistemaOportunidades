<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContratacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'tip_nome',
    ];

    // Relação 1 para muitos com vagas
    public function vagas() {
        return $this->hasMany(Vagas::class, 'tip_id');
    }
}
