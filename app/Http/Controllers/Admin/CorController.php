<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    // lista cores
    public function index()
    {
        $cores = Cor::latest()->get();
        return view('admin.cores.index', compact('cores'));
    }

    // tela de criar
    public function create()
    {
        return view('admin.cores.create');
    }

    // salva nova cor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ], [
            'nome.required' => 'O nome da cor é obrigatório.',
            'nome.max' => 'O nome da cor não pode ter mais de 255 caracteres.',
        ]);

        Cor::create($validated);

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor criada com sucesso!');
    }

    // mostra uma cor
    public function show(string $id)
    {
        $cor = Cor::findOrFail($id);
        return view('admin.cores.show', compact('cor'));
    }

    // tela de editar
    public function edit(string $id)
    {
        $cor = Cor::findOrFail($id);
        return view('admin.cores.edit', compact('cor'));
    }

    // atualiza cor
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ], [
            'nome.required' => 'O nome da cor é obrigatório.',
            'nome.max' => 'O nome da cor não pode ter mais de 255 caracteres.',
        ]);

        $cor = Cor::findOrFail($id);
        $cor->update($validated);

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor atualizada com sucesso!');
    }

    // exclui cor
    public function destroy(string $id)
    {
        $cor = Cor::findOrFail($id);
        $cor->delete();

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor excluída com sucesso!');
    }
}
