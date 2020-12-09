<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
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
    }

    public function index()
    {
        $vagas = DB::table('vagas')
            ->join('cidades', 'vagas.cid_id', '=', 'cidades.id')
            ->join('areas', 'vagas.are_id', '=', 'areas.id')
            ->join('divulgadores', 'vagas.div_id', '=', 'divulgadores.id')
            ->join('tipo_contratacoes', 'vagas.tip_id', '=', 'tipo_contratacoes.id')
            ->join('formato_trabalhos', 'vagas.fdt_id', '=', 'formato_trabalhos.id')
            ->select('vagas.*', 'cidades.*', 'areas.area_nome', 'divulgadores.*', 'tipo_contratacoes.tip_nome', 'formato_trabalhos.fdt_nome')->where('vagas.vag_status', '=', 1)->orderBy('vagas.id', 'asc')
            ->get();

        return view('publico')->with('vagas', $vagas);
    }
}
