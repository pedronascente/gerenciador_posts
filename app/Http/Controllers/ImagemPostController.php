<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagens = Imagem::all();
        return view('adm.imagens.list', ['imagens' => $imagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.imagens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');
        $imagem  = new Imagem();
        $imagem->nome = $path;
        $imagem->src = '<img src="/storage/' . $path . '" class="py-3" width="100%">';
        $imagem->save();
        return redirect(route('imagem.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $errt = '[x] - imagem <br>';
        $errt .= 'nome: 23444545 <br>';
        $errt .= ' scr = https://seusite/public/img/wffds.jpg <br>';
        $errt .= 'incorporar imagem : <br> <.img scrc= "https://seusite/public/img/wffds.jpg" class="efefef" .> <br>';
        return $errt;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recuperar a imagem do banco.
        $imagem = Imagem::find($id);
        // Verificar se existe arquivo.
        if ($imagem) {
            // Recuperar o nome do arquivo
            $nome = $imagem->nome;
            // Deletar arquivo
            Storage::disk('public')->delete($nome);
            // Deletar arquivo na base de dados
            $imagem->delete();
        }
        //Redirecionar usuario.
        return redirect(route('imagem.index'));
    }
}
