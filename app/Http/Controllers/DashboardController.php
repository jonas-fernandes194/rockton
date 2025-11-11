<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumModel;
use App\Models\Band;
use App\Models\Member;
use App\Models\Music;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         $dados['title'] = 'Dashboard';
         $dados['album'] = Album::count();
         $dados['band'] = Band::count();
         $dados['musics'] = Music::count();
         $dados['members'] = Member::count();
         return view('dashboard', $dados);
    }
}
