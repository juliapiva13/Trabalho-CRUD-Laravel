<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // tela de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // faz o login do comprador
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // só deixa comprador entrar aqui
            if (Auth::user()->isComprador()) {
                return redirect()->intended('/');
            }
            
            // se não for comprador, sai
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Esta área é apenas para compradores. Use o login administrativo.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    // sair da conta
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
