<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CidadeController extends Controller
{
    private $cidade;

    public function __construct()
    {
        $this->cidade = new Cidade();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = $this->cidade::all();
        return view('cidade.content_cidade')
            ->with('cidades', $cidades);
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
            'cid_nome' => 'required|max:85',
            'cid_uf' => ['required', 'max:2']
        ]);

        $cidades =  $this->cidade;
        $cidades->cid_nome = $request->input('cid_nome');
        $cidades->cid_uf = strtoupper($request->input('cid_uf'));

        $cidades->save();

        if ($request->input('ajax')) {
            return json_encode($cidades);
        }

        return redirect('cidade')
            ->with('success', 'Cidade salva com sucesso!');
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
            'cid_nome' => ['required', 'max:85'],
            'cid_uf' => ['required', 'max:2']
        ]);

        $cidades =  $this->cidade::find($id);
        $cidades->cid_nome = $request->input('cid_nome');
        $cidades->cid_uf = strtoupper($request->input('cid_uf'));


        $cidades->save();


        return redirect('cidade')
            ->with('success', 'Cidade alterada com sucesso!');
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
            $cidades = $this->cidade::find($id);
            $cidades->delete();
            //return redirect('cidade')->with('success', 'Cidade excluído com sucesso!');
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
