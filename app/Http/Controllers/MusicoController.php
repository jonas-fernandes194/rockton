<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MusicoRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MusicoController extends Controller
{
    public function index(){
        $dados['title'] = 'Arena | Músicos';
        $dados['musicos'] = Member::orderBy('name', 'asc')->paginate(5);
        return view('pages.musico.index', $dados);
    }

    public function create(){
        $dados['title'] = 'Arena | Cadastro de músicos';
        return view('pages.musico.create', $dados);
    }

    public function store(MusicoRequest $request){
        $data = $request->validated();    
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('musicos', 'public');
            $data['cover'] = $path;
        }

        Member::create($data);
        return redirect()->route('musico.index')->with('success', 'Músico cadastrado com sucesso!');
    }
    
}
