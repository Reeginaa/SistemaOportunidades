<?php

namespace App\Http\Controllers;

use App\Models\FormatoTrabalhos;
use Illuminate\Http\Request;

class FormatoTrabalhosController extends Controller
{
    private $formatotrabalhos;

    public function __construct()
    {
        $this->formatotrabalhos = new FormatoTrabalhos();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatotrabalhos = $this->formatotrabalhos::all();
        return view('formatotrabalhos.content_formatotrabalhos')
            ->with('formatotrabalhos', $formatotrabalhos);
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
            'fdt_nome' => 'required|max:100',
        ]);

        $formatotrabalhos =  $this->formatotrabalhos;
        $formatotrabalhos->fdt_nome = $request->input('fdt_nome');

        $formatotrabalhos->save();

        if ($request->input('ajax')) {
            return json_encode($formatotrabalhos);
        }

        return redirect('formatotrabalhos')
            ->with('success', 'Formato de Trabalho salvo com sucesso!');
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
            'fdt_nome' => ['required', 'max:100'],
        ]);

        $formatotrabalhos =  $this->formatotrabalhos::find($id);
        $formatotrabalhos->fdt_nome = $request->input('fdt_nome');


        $formatotrabalhos->save();


        return redirect('formatotrabalhos')
            ->with('success', 'Formato de Trabalho alterado com sucesso!');
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
            $formatotrabalhos = $this->formatotrabalhos::find($id);
            $formatotrabalhos->delete();
            //return redirect('formatotrabalhos')->with('success', 'Formato de Trabalho excluído com sucesso!');
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
