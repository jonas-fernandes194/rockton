<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        dd($request->all());
    }
}