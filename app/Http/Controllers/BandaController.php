<?php

namespace App\Http\Controllers;

use App\Enums\Banda\StatusBanda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Member;
use App\Models\BandMember;
use App\Enums\Musico\StatusMusico;
use App\Http\Requests\BandaRequest;

class BandaController extends Controller
{
    public function index(){
        $dados['title'] = 'Arena / Bandas';
        $dados['bandas'] = Band::orderBy('name', 'asc')->paginate(5);
        return view('pages.banda.index', $dados);
    }

    public function create(){
        $dados['title'] = 'Arena / Cadastro de bandas';
        $dados['musicos'] = Member::where('status', StatusMusico::Ativo)
                                    ->orderBy('name', 'asc')->get();
        return view('pages.banda.create', $dados);
    }

    public function edit($id){
        $dados['title'] = 'Arena > Editar Bandas';
        $dados['banda'] = Band::find($id);
        $dados['status'] = StatusBanda::cases();
        return view('pages.banda.edit', $dados);
    }

    public function store(BandaRequest $request){
         $data = $request->validated();    

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('bandas/foto', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('bandas/capa', 'public');
            $data['cover'] = $path;
        }
       
        $data['status'] = StatusBanda::Ativo;
        $band = Band::create($data);
        $memberIds = $request->input('member_id'); 

        foreach ($memberIds as $memberId) {
            BandMember::create([
                'band_id'       => $band->id,
                'member_id'     => $memberId,
                'status_band'   => StatusBanda::Ativo,
                'status_member' => StatusMusico::Inativo,
            ]);
        }
        
        return redirect()->route('banda.index')->with('success', 'Banda cadastrada com sucesso!');
    }
}
