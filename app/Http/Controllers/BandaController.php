<?php

namespace App\Http\Controllers;

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
            $path = $file->store('bandas/foto', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $path = $file->store('bandas/capa', 'public');
            $data['cover'] = $path;
        }
       
        $data['status'] = 'A';
        $band = Band::create($data);
        $memberIds = $request->input('member_id'); 

        foreach ($memberIds as $memberId) {
            BandMember::create([
                'band_id'       => $band->id,
                'member_id'     => $memberId,
                'status_band'   => 'A',
                'status_member' => 'A',
            ]);
        }
        
        return redirect()->route('banda.index')->with('success', 'Banda cadastrada com sucesso!');
    }
}
