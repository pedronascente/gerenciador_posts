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
        // Recuperar dados da imagem na base de dados
        $imagem = Imagem::find($id);
        // Criar array_list dos dados
        // Retornar view
        return view('adm.imagens.show', ['imagem' => $imagem]);
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

    public function download($id)
    {
        $imagem = Imagem::find($id);
        if (isset($imagem)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($imagem->nome);
            return response()->download($path);
        }
        return redirect(route('imagem.index'));
    }
}
