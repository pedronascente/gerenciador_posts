<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessoes = Sessao::orderBy('id', 'desc')->get();
        return view('adm.sessoes.list', ['sessoes' => $sessoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.sessoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nome'  => 'required||max:255|min:5', //Requer o campo, ao menos 5 caracteres e no mácimo 255
            ],
            [
                'nome.required' => 'Digite um nome para continuar', //Criamos uma mensagem personalizada para quando o tipo required não for satisfeito 
            ]
        );

        $s = new Sessao();
        $s->nome = $request->nome;
        $s->save();
        if ($s->id) {
            return redirect(route('sessao.index'));
        } else {
            dd('erro ao cadastrar sessao!');
        }
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
        $sessao = Sessao::find($id);
        return view('adm.sessoes.edit', ['sessao' => $sessao]);
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

        $request->validate(
            [
                'nome'  => 'required||max:255|min:5', //Requer o campo, ao menos 5 caracteres e no mácimo 255
            ],
            [
                'nome.required' => 'Digite um nome para continuar', //Criamos uma mensagem personalizada para quando o tipo required não for satisfeito 
            ]
        );
        $s = Sessao::find($id);
        if (isset($s)) {
            $s->nome = $request->nome;
            $s->update();
        }
        return redirect(route('sessao.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessao = Sessao::find($id);
        if (isset($sessao)) {
            $sessao->delete();
        }
        return redirect(route('sessao.index'));
    }
}
