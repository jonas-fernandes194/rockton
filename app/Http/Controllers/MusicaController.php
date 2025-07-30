<?php

namespace App\Http\Controllers;

use App\Enums\Banda\StatusBanda;
use App\Http\Controllers\Controller;
use App\Http\Requests\MusicaRequest;
use App\Models\Band;
use Illuminate\Http\Request;
use App\Models\Music;

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

    public function store(MusicaRequest $request){
        $data = $request->validated(); 
       
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('musicas/foto', 'public');
            $data['photo'] = $path;
        }

        Music::create($data);
    }
}