<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        return view('adm.categorias.list', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.categorias.create');
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

        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->save();
        if ($categoria->id) {
            return redirect(route('categoria.index'));
        } else {
            dd('erro ao cadastrar categoria!');
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
        echo 'visualizar post' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('adm.categorias.edit', ['categoria' => $categoria]);
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
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            $categoria->nome = $request->nome;
            $categoria->update();
        }
        return redirect(route('categoria.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            $categoria->delete();
        }

        return redirect(route('categoria.index'));
    }
}
