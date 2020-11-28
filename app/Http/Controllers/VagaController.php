<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Cidade;
use App\Models\Area;
use App\Models\Divulgadores;
use App\Models\TipoContratacoes;
use App\Models\FormatoTrabalhos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VagaController extends Controller
{
    private $vaga;

    public function __construct()
    {
        $this->vaga = new Vaga();
        $this->cidade = new Cidade();
        $this->area = new Area();
        $this->divulgador = new Divulgadores();
        $this->tipoContratacao = new TipoContratacoes();
        $this->formatoTrabalho = new FormatoTrabalhos();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = $this->vaga::all();
        $cidades = $this->cidade::all()->sortBy('cid_nome');
        $areas = $this->area::all()->sortBy('area_nome');
        $divulgadores = $this->divulgador::all()->sortBy('div_nome');
        $tiposContratacao = $this->tipoContratacao::all()->sortBy('tip_nome');
        $formatosTrabalho = $this->formatoTrabalho::all()->sortBy('fdt_nome');

        return view('vaga.content_vaga')
            ->with('vagas', $vagas)
            ->with('cidades', $cidades)
            ->with('areas', $areas)
            ->with('divulgadores', $divulgadores)
            ->with('tiposContratacao', $tiposContratacao)
            ->with('formatosTrabalho', $formatosTrabalho);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'vag_status' => 'required|numeric',
            'vag_motivo_recusa' => 'max:500',
            'vag_faixa_salarial' => 'nullable|numeric',
            'vag_carga_horaria' => 'required|numeric',
            'vag_habilidades' => 'required|max:250',
            'vag_diferenciais' => 'max:250',
            'vag_beneficios' => 'max:250',
            'vag_informacoes_adicionais' => 'max:500',
            'vag_numero_de_vagas' => 'required',
            'vag_cep' => 'required',
            'cid_id' => 'required|numeric|min:1',
            'are_id' => 'required|numeric|min:1',
            'div_id' => 'required|numeric|min:1',
            'tip_id' => 'required|numeric|min:1',
            'fdt_id' => 'required|numeric|min:1',
        ]);

        $vaga =  $this->vaga;
        $vaga->vag_data_publicacao = Carbon::now()->toDateTimeString();
        $vaga->vag_data_alteracao = Carbon::now()->toDateTimeString();
        $vaga->vag_status = $request->input('vag_status');
        $vaga->vag_motivo_recusa = $request->input('vag_motivo_recusa') ? $request->input('vag_motivo_recusa') : '';
        $vaga->vag_carga_horaria = $request->input('vag_carga_horaria');
        $vaga->vag_habilidades = $request->input('vag_habilidades');
        $vaga->vag_diferenciais = $request->input('vag_diferenciais');
        $vaga->vag_faixa_salarial = $request->input('vag_faixa_salarial');
        $vaga->vag_beneficios = $request->input('vag_beneficios');
        $vaga->vag_informacoes_adicionais = $request->input('vag_informacoes_adicionais');
        $vaga->vag_numero_de_vagas = $request->input('vag_numero_de_vagas');
        $vaga->vag_cep = $request->input('vag_cep');
        $vaga->cid_id = $request->input('cid_id');
        $vaga->are_id = $request->input('are_id');
        $vaga->div_id = $request->input('div_id');
        $vaga->tip_id = $request->input('tip_id');
        $vaga->fdt_id = $request->input('fdt_id');

        $vaga->save();

        return redirect('vagas')->with('success', 'Vaga criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vag_status' => 'required|numeric',
            'vag_motivo_recusa' => 'max:500',
            'vag_faixa_salarial' => 'nullable|numeric',
            'vag_carga_horaria' => 'required|numeric',
            'vag_habilidades' => 'required|max:250',
            'vag_diferenciais' => 'max:250',
            'vag_beneficios' => 'max:250',
            'vag_informacoes_adicionais' => 'max:500',
            'vag_numero_de_vagas' => 'required',
            'vag_cep' => 'required',
            'cid_id' => 'required|numeric|min:1',
            'are_id' => 'required|numeric|min:1',
            'div_id' => 'required|numeric|min:1',
            'tip_id' => 'required|numeric|min:1',
            'fdt_id' => 'required|numeric|min:1',
        ]);

        $vaga = $this->vaga::find($id);
        $vaga->vag_data_publicacao = Carbon::now()->toDateTimeString();
        $vaga->vag_data_alteracao = Carbon::now()->toDateTimeString();
        $vaga->vag_status = $request->input('vag_status');
        $vaga->vag_motivo_recusa = $request->input('vag_motivo_recusa') ? $request->input('vag_motivo_recusa') : '';
        $vaga->vag_carga_horaria = $request->input('vag_carga_horaria');
        $vaga->vag_habilidades = $request->input('vag_habilidades');
        $vaga->vag_diferenciais = $request->input('vag_diferenciais');
        $vaga->vag_faixa_salarial = $request->input('vag_faixa_salarial');
        $vaga->vag_beneficios = $request->input('vag_beneficios');
        $vaga->vag_informacoes_adicionais = $request->input('vag_informacoes_adicionais');
        $vaga->vag_numero_de_vagas = $request->input('vag_numero_de_vagas');
        $vaga->vag_cep = $request->input('vag_cep');
        $vaga->cid_id = $request->input('cid_id');
        $vaga->are_id = $request->input('are_id');
        $vaga->div_id = $request->input('div_id');
        $vaga->tip_id = $request->input('tip_id');
        $vaga->fdt_id = $request->input('fdt_id');

        $vaga->save();

        return redirect('vagas')
            ->with('success', 'Vaga alterada com sucesso!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            $vaga = $this->vaga::find($id);
            $vaga->delete();

            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
