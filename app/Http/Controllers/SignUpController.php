<?php

namespace App\Http\Controllers;

use App\Rules\CPF;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signup(Request $request){
        $validated = $request->validate([
            'name'=> ['required', 'min: 3', 'max: 20'],
            'email' => ['required','email'],
            'cpf' => ['required', new CPF],
            'birthDate' => ['required', 'strtotime'],
            'password' => ['required'],
        ]);

        dd($validated);
    }
}
