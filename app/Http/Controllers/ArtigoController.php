<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artigo;
use App\Models\Sessao;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::orderBy('id', 'desc')->get();
        return view('adm.artigos.list', ['artigos' => $artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $sessoes = Sessao::all();
        return view('adm.artigos.create', [
            'categorias' => $categorias,
            'sessoes' => $sessoes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //[X] Validar dados vindos do formulário.
        $request->validate(
            [
                'titulo' => 'required ||max:255|min:5',
                'descricao' => 'required ||max:150|min:5',
                'texto' => 'required',
                'categoria_id' => 'required',
            ],
            [
                'titulo.required' => 'Digite o titulo do artigo para continuar',
                'descricao.required' => 'Digite uma breve descrição para continuar',
                'texto.required' => 'Digite um texto para continuar',
                'categoria_id.required' => 'Selecione uma categoria para continuar',
            ]
        );

        //[X] Retornar a categoria que será associada.
        $categoria = Categoria::find($request->categoria_id);
        //[X] Retornar usuario logado.
        $user = User::find(auth()->user()->id);
        //[X] Instanciar objeto artigo que será persistido na base.
        $artigo = new Artigo();
        //[X] ADD novos registros vindo do formulario.
        $artigo->titulo = $request->titulo;
        $artigo->descricao = $request->descricao;
        $artigo->texto = $request->texto;
        $artigo->categoria()->associate($categoria);
        $artigo->user()->associate($user);
        //[X] Salvar na base Mysql.
        $artigo->save();
        //[X] Recuperar do formulario as novas publicações.
        $publicacoes = array_keys($request->publicar);
        if ($artigo->id) {
            foreach ($publicacoes as $value) {
                $artigo->sessoes()->attach($value);
            }
        }
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artigo = Artigo::where('id', $id)->with('sessoes')->get();
        return view('adm.artigos.show', ['artigo' => $artigo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artigo = Artigo::where('id', $id)->with('sessoes')->get();
        $categorias = Categoria::all();
        $sessoes = Sessao::all();
        return view('adm.artigos.edit', [
            'artigo' => $artigo,
            'categorias' => $categorias,
            'sessoes' => $sessoes,
        ]);
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
        //[X] Recuperar o arquivo que será atualizado.
        $artigo = Artigo::find($id);
        //[X] ADD Atualizações vindas do formulario.
        $artigo->titulo = $request->titulo;
        $artigo->descricao = $request->descricao;
        $artigo->texto = $request->texto;
        //[X] Recuperar a categoria que será associada.
        $categoria = Categoria::find($request->categoria_id);
        //[X] Associar a categoria ao arquivo.
        $artigo->categoria()->associate($categoria);
        //[X] Atualizar o Arquivo.
        $artigo->update(); //atualizar artigo
        //[X] Buscar as publicações existentes do arquivo atualizado.
        $artigo_publicados = Artigo::where('id', $artigo->id)->with('sessoes')->get();
        //[X] Desassociar as publicações existentes.
        foreach ($artigo_publicados as  $value) {
            for ($i = 0; $i < count($value->sessoes); $i++) {
                $artigo->sessoes()->detach($value->sessoes[$i]->id);
            }
        }
        //[X] Associar as novas publicações do arquivo.
        if (!empty($request->publicar)) {
            $publicacoes = array_keys($request->publicar);
            foreach ($publicacoes as $value) {
                $artigo->sessoes()->attach($value);
            }
        }
        //[X] Redirecionar cliente para pagina post.index.
        return redirect(route('post.show', $artigo->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Buscar artigo na base 
        $artigo = Artigo::find($id);
        if ($artigo) {
            $artigo->delete();
        }
        return redirect(route('post.index'));
    }
}
