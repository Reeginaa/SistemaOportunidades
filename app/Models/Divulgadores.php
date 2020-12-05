<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divulgadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'div_cnpj',
        'div_nome',
        'div_telefone',
        'div_email',
        'div_rua',
        'div_bairro',
        'div_numero',
        'div_complemento',
        'cid_id',
    ];

    // Relação 1 para muitos com vagas
    public function vagas()
    {
        return $this->hasMany(Vagas::class, 'div_id');
    }

    // Relação (MUITOS para 1)
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cid_id', 'id');
    }
}