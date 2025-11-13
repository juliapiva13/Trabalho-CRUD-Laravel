<?php

namespace App\Http\Controllers\Comprador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // mostra o perfil
    public function index()
    {
        $user = Auth::user();
        return view('comprador.profile.index', compact('user'));
    }

    // tela de editar perfil
    public function edit()
    {
        $user = Auth::user();
        return view('comprador.profile.edit', compact('user'));
    }

    // salva as alterações do perfil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'telefone' => 'nullable|string|max:20',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'telefone.max' => 'O telefone não pode ter mais de 20 caracteres.',
        ]);

        $user->update($validated);

        return redirect()->route('comprador.profile')
            ->with('success', 'Perfil atualizado com sucesso!');
    }

    // tela de trocar senha
    public function showChangePasswordForm()
    {
        return view('comprador.profile.change-password');
    }

    // atualiza a senha
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'current_password.required' => 'A senha atual é obrigatória.',
            'password.required' => 'A nova senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);

        $user = Auth::user();

        // confere se a senha atual tá certa
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('comprador.profile')
            ->with('success', 'Senha alterada com sucesso!');
    }

    // tela de excluir conta
    public function showDeleteForm()
    {
        return view('comprador.profile.delete');
    }

    // exclui a conta
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
        ], [
            'password.required' => 'A senha é obrigatória para confirmar a exclusão.',
        ]);

        $user = Auth::user();

        // confere a senha antes de excluir
        if (!Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['password' => 'A senha está incorreta.']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()->route('veiculos.index')
            ->with('success', 'Sua conta foi excluída com sucesso.');
    }
}
