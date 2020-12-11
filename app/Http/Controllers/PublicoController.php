<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Cidade;
use App\Models\Divulgadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PublicoController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->vaga = new Vaga();
        $this->cidades = new Cidade();
        $this->divulgadores = new Divulgadores();
    }

    public function index()
    {
        $vagas = DB::select('SELECT vag.*,
                    divu.div_cnpj, divu.div_nome, divu.div_telefone, divu.div_email, divu.div_rua, divu.div_bairro, divu.div_numero, divu.div_complemento,
                    cid.cid_nome , cid.cid_uf,
                    are.area_nome,
                    tip.tip_nome,
                    fdt.fdt_nome
            FROM vagas vag
            INNER JOIN divulgadores divu ON vag.div_id = divu.id
            INNER JOIN cidades cid ON vag.cid_id = cid.id
            INNER JOIN areas are ON vag.are_id = are.id
            INNER JOIN tipo_contratacoes tip ON vag.tip_id = tip.id
            INNER JOIN formato_trabalhos fdt ON vag.fdt_id = fdt.id
            WHERE vag.vag_status = 1 AND vag.vag_data_publicacao >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
            ORDER BY vag.id ASC');

        return view('publico')->with('vagas', $vagas);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function detalhes($id)
    {
        // Busca o maior id da tabela
        $maiorId = DB::select('SELECT * FROM vagas ORDER BY id DESC LIMIT 1')[0];

        // Busca
        for ($i = 1; $i <= $maiorId->id; $i++) {
            if (hash("sha256", md5($i + 2.42)) == $id) {
                $vagas = $this->vaga::find($i);
                $divulgador = $this->divulgadores::find($vagas->div_id);
                $cidade_divulgador = $this->cidades::find($divulgador->cid_id);
                $vaga = DB::table('vagas')
                    ->join('cidades', 'vagas.cid_id', '=', 'cidades.id')
                    ->join('areas', 'vagas.are_id', '=', 'areas.id')
                    ->join('divulgadores', 'vagas.div_id', '=', 'divulgadores.id')
                    ->join('tipo_contratacoes', 'vagas.tip_id', '=', 'tipo_contratacoes.id')
                    ->join('formato_trabalhos', 'vagas.fdt_id', '=', 'formato_trabalhos.id')
                    ->select('divulgadores.*', 'cidades.*', 'areas.area_nome', 'vagas.*', 'tipo_contratacoes.tip_nome', 'formato_trabalhos.fdt_nome', 'divulgadores.div_nome')
                    ->where('vagas.vag_status', '=', 1)
                    ->where('vagas.id', '=', $i)
                    ->orderBy('vagas.id', 'asc')
                    ->first();

                return view('detalhesvaga')->with('vaga', $vaga)->with('cidade_divulgador', $cidade_divulgador);
            }
        }

       /* $vagas = DB::select('SELECT vag.*,
                    divu.div_cnpj, divu.div_nome, divu.div_telefone, divu.div_email, divu.div_rua, divu.div_bairro, divu.div_numero, divu.div_complemento,
                    cid.cid_nome , cid.cid_uf,
                    are.area_nome,
                    tip.tip_nome,
                    fdt.fdt_nome
            FROM vagas vag
            INNER JOIN divulgadores divu ON vag.div_id = divu.id
            INNER JOIN cidades cid ON vag.cid_id = cid.id
            INNER JOIN areas are ON vag.are_id = are.id
            INNER JOIN tipo_contratacoes tip ON vag.tip_id = tip.id
            INNER JOIN formato_trabalhos fdt ON vag.fdt_id = fdt.id
            WHERE vag.vag_status = 1 AND vag.vag_data_publicacao >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
            ORDER BY vag.id ASC');*/

        //return view('home')->with('vagas', $vagas)->with('error', 'Vaga não encontrada!');
        return $this->index();
    }
}
