<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    // lista todas as marcas
    public function index()
    {
        $marcas = Marca::latest()->get();
        return view('admin.marcas.index', compact('marcas'));
    }

    // tela de criar marca
    public function create()
    {
        return view('admin.marcas.create');
    }

    // salva nova marca
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ], [
            'nome.required' => 'O nome da marca é obrigatório.',
            'nome.max' => 'O nome da marca não pode ter mais de 255 caracteres.',
        ]);

        Marca::create($validated);

        return redirect()->route('admin.marcas.index')
            ->with('success', 'Marca criada com sucesso!');
    }

    public function show(string $id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.show', compact('marca'));
    }

    // tela de editar
    public function edit(string $id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    // atualiza a marca
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ], [
            'nome.required' => 'O nome da marca é obrigatório.',
            'nome.max' => 'O nome da marca não pode ter mais de 255 caracteres.',
        ]);

        $marca = Marca::findOrFail($id);
        $marca->update($validated);

        return redirect()->route('admin.marcas.index')
            ->with('success', 'Marca atualizada com sucesso!');
    }

    // exclui marca
    public function destroy(string $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();

        return redirect()->route('admin.marcas.index')
            ->with('success', 'Marca excluída com sucesso!');
    }
}
