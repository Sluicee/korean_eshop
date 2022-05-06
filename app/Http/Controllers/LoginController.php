<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $formFields = $request->only([
            'email',
            'password'
        ]);

        if(Auth::attempt($formFields)) {
            return redirect()->intended(route('home'));
        }

        return redirect()->to(route('home'))->withErrors([
            'login' => 'Ошибка авторизации'
        ]);
    }

}
