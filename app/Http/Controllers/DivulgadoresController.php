<?php

namespace App\Http\Controllers;

use App\Models\Divulgadores;
use App\Models\Cidade;
use Illuminate\Http\Request;

class DivulgadoresController extends Controller
{
    private $divulgadores;
    private $cidades;

    public function __construct()
    {
        $this->divulgadores = new Divulgadores();
        $this->cidades = new Cidade();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divulgadores = $this->divulgadores::all();
        $cidades = $this->cidades::all()->sortBy('nome');
        return view('divulgadores.content_divulgadores')->with('divulgadores', $divulgadores)->with('cidades', $cidades);
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
            'div_nome' => 'required|max:100',
            'div_telefone' => 'required|max:15',
            'div_email' => 'required|max:100',
            'div_rua' => 'required|max:50',
            'div_bairro' => 'required|max:50',
            'div_numero' => 'required|max:20',
            'div_complemento' => 'required|max:50',
            'cid_id' => 'required|numeric|min:1',
        ]);

        $divulgadores =  $this->divulgadores;
        $divulgadores->div_nome = $request->input('div_nome');
        $divulgadores->div_telefone = $request->input('div_telefone');
        $divulgadores->div_email = $request->input('div_email');
        $divulgadores->div_rua = $request->input('div_rua');
        $divulgadores->div_bairro = $request->input('div_bairro');
        $divulgadores->div_numero = $request->input('div_numero');
        $divulgadores->div_complemento = $request->input('div_complemento');

        $divulgadores->save();

        return redirect('divulgadores')->with('success', 'Anunciante salvo com sucesso!');
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
            'div_nome' => 'required|max:100',
            'div_telefone' => 'required|max:15',
            'div_email' => 'required|max:100',
            'div_rua' => 'required|max:50',
            'div_bairro' => 'required|max:50',
            'div_numero' => 'required|max:20',
            'div_complemento' => 'required|max:50',
            'cid_id' => 'required|numeric|min:1',
        ]);

        $divulgadores =  $this->divulgadores::find($id);
        $divulgadores->div_nome = $request->input('div_nome');
        $divulgadores->div_telefone = $request->input('div_telefone');
        $divulgadores->div_email = $request->input('div_email');
        $divulgadores->div_rua = $request->input('div_rua');
        $divulgadores->div_bairro = $request->input('div_bairro');
        $divulgadores->div_numero = $request->input('div_numero');
        $divulgadores->div_complemento = $request->input('div_complemento');

        $divulgadores->save();

        return redirect('divulgadores')->with('success', 'Anunciante alterado com sucesso!');
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
            $divulgadores = $this->divulgadores::find($id);
            $divulgadores->delete();
            //return redirect('divulgadores')->with('success', 'Anunciante excluído com sucesso!');
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
