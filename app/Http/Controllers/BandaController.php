<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BandaRequest;
use App\Models\Band;
use App\Models\Member;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function index(){
        $dados['title'] = 'Arena | Bandas';
        $dados['bands'] = Band::orderBy('title', 'asc')->paginate(5);
        return view('pages.banda.index', $dados);
    }

    public function create(){
        $dados['title'] = 'Arena | Cadastro de bandas';
        $dados['musicos'] = Member::orderBy('name', 'asc')->get();
        return view('pages.banda.create', $dados);
    }

    public function store(BandaRequest $request){
        
    }
}
