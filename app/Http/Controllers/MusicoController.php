<?php

namespace App\Http\Controllers;

use App\Enums\Musico\StatusMusico;
use App\Http\Controllers\Controller;
use App\Http\Requests\MusicoRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MusicoController extends Controller
{
    public function index(){
        $dados['title'] = 'Arena / Músicos';
        $dados['musicos'] = Member::orderBy('name', 'asc')->paginate(5);
        return view('pages.musico.index', $dados);
    }

    public function create(){
        $dados['title'] = 'Arena / Cadastro de músicos';
        return view('pages.musico.create', $dados);
    }

    public function edit($id){
        $dados['title'] = 'Arena / Editar músicos';
        $dados['musico'] = Member::find($id);
        $dados['status'] = StatusMusico::cases();
        return view('pages.musico.edit', $dados);
    }

    public function store(MusicoRequest $request){
        $data = $request->validated();    
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('musicos/foto', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('musicos/capa', 'public');
            $data['cover'] = $path;
        }
        
        $data['status'] = StatusMusico::Ativo;
        Member::create($data);
        return redirect()->route('musico.index')->with('success', 'Músico cadastrado com sucesso!');
    }

    public function update(MusicoRequest $request, $id){
        $musico = Member::find($id);
        $data = $request->validated();
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('musicos', 'public');
            $data['cover'] = $path;
        } else {
            unset($data['cover']);
        }
        $musico->update($data);
        return redirect()->route('musico.index', $musico->id)->with('success', 'Músico atualizado com sucesso!');
    }

    public function destroy(Request $request){
        $ids = $request->input('ids');
        
        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'IDs inválidos.'], 400);
        }

        Member::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Registros excluídos com sucesso.']);
    }
}
