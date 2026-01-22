<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }

    public function autenticar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'password.required' => 'O campo senha é obrigatório'
        ]);

        $credenciais = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credenciais, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('app.home'));
        }

        return back()->withErrors([
            'error' => 'E-mail ou senha incorretos.'
        ])->withInput($request->only('email'));
    }

    public function sair(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site.index');
    }
}
