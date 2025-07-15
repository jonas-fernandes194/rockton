<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Member;
use App\Enums\Musico\StatusMusico;
use App\Http\Requests\BandaRequest;

class BandaController extends Controller
{
    public function index(){
        $dados['title'] = 'ARENA > BANDAS';
        $dados['bandas'] = Band::orderBy('name', 'asc');
        return view('pages.banda.index', $dados);
    }

    public function create(){
        $dados['title'] = 'ARENA > CADASTRO DE BANDAS';
        $dados['musicos'] = Member::where('status', StatusMusico::ATIVO)
                                    ->orderBy('name', 'asc')->get();
        return view('pages.banda.create', $dados);
    }

    public function store(BandaRequest $request){
         $data = $request->validated();    
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('bandas', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('bandas', 'public');
            $data['cover'] = $path;
        }

        Band::create($data);
        return redirect()->route('banda.index')->with('success', 'Banda cadastrada com sucesso!');
    }
}
