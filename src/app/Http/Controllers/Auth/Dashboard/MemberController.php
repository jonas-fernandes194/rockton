<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){
        return view('auth.dashboard.members.index');
    }
}
