<?php

namespace App\Http\Controllers;

use App\Models\TipoContratacoes;
use Illuminate\Http\Request;

class TipoContratacoesController extends Controller
{
    private $tipocontratacoes;

    public function __construct()
    {
        $this->tipocontratacoes = new TipoContratacoes();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocontratacoes = $this->tipocontratacoes::all();
        return view('tipocontratacoes.content_tipocontratacoes')
            ->with('tipocontratacoes', $tipocontratacoes);
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
            'tip_nome' => 'required|max:100',
        ]);

        $tipocontratacoes =  $this->tipocontratacoes;
        $tipocontratacoes->tip_nome = $request->input('tip_nome');

        $tipocontratacoes->save();

        if ($request->input('ajax')) {
            return json_encode($tipocontratacoes);
        }

        return redirect('tipocontratacoes')
            ->with('success', 'Tipo de Contratação salvo com sucesso!');
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
            'tip_nome' => ['required', 'max:100'],
        ]);

        $tipocontratacoes =  $this->tipocontratacoes::find($id);
        $tipocontratacoes->tip_nome = $request->input('tip_nome');


        $tipocontratacoes->save();


        return redirect('tipocontratacoes')
            ->with('success', 'Tipo de Contratação alterado com sucesso!');
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
            $tipocontratacoes = $this->tipocontratacoes::find($id);
            $tipocontratacoes->delete();
            //return redirect('tipocontratacoes')->with('success', 'Tipo de Contratação excluído com sucesso!');
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
