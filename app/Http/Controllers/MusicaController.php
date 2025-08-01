<?php

namespace App\Http\Controllers;

use App\Enums\Banda\StatusBanda;
use App\Http\Controllers\Controller;
use App\Http\Requests\MusicaRequest;
use App\Models\Band;
use App\Models\Music;
use Illuminate\Http\Request;


class MusicaController extends Controller
{
    public function index(){
        $dados['title'] = 'Arena / Músicos';
        $dados['musicas'] = Music::orderBy('title', 'asc')->paginate(5);
        return view('pages.musica.index', $dados);
    }

    public function create(){
        $dados['title'] = 'Arena / Cadastro de músicas';
        $dados['bandas'] = Band::where('status', StatusBanda::Ativo)
                                    ->orderBy('name', 'asc')->get();
        return view('pages.musica.create', $dados);
    }

    public function edit($id){
        $dados['title'] = 'Arena / Editar músicas';
        $dados['musica'] = Music::find($id);
        $dados['bandas'] = Band::find($id);
        return view('pages.musica.edit', $dados);
    }

    public function store(MusicaRequest $request){
        $data = $request->validated(); 
        Music::create($data);
        return redirect()->route('musica.index')->with('success', 'Música cadastrado com sucesso!');
    }

    public function update(MusicaRequest $request, $id){
        $musica = Music::find($id);
        $data = $request->validated();
        $musica->update($data);
        return redirect()->route('musica.index', $musica->id)->with('success', 'Música atualizado com sucesso!');
    }
}