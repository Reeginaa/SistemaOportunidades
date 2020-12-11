<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'vag_data_publicacao',
        'vag_data_alteracao',
        'vag_status',
        'vag_carga_horaria',
        'vag_habilidades',
        'vag_diferenciais',
        'vag_faixa_salarial',
        'vag_beneficios',
        'vag_informacoes_adicionais',
        'vag_numero_de_vagas',
        'vag_cep',
        'cid_id',
        'are_id',
        'div_id',
        'tip_id',
        'fdt_id'
    ];

    // Relação (MUITOS para 1)
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cid_id', 'id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'are_id', 'id');
    }
    public function divulgador()
    {
        return $this->belongsTo(Divulgadores::class, 'div_id', 'id');
    }
    public function tipoContratacao()
    {
        return $this->belongsTo(TipoContratacoes::class, 'tip_id', 'id');
    }
    public function formatoTrabalho()
    {
        return $this->belongsTo(FormatoTrabalhos::class, 'fdt_id', 'id');
    }
}
