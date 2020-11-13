<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'cid_nome',
        'cid_uf'
    ];

    // Relação 1 para muitos com vagas
    public function divulgadores() {
        return $this->hasMany(Divulgadores::class, 'div_id');
    }

    // Relação 1 para muitos com vagas
    public function vagas() {
        return $this->hasMany(Vagas::class, 'cid_id');
    }
}
