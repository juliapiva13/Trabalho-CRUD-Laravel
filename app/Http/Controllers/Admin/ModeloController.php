<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    // lista modelos
    public function index()
    {
        $modelos = Modelo::with('marca')->latest()->get();
        return view('admin.modelos.index', compact('modelos'));
    }

    // tela de criar
    public function create()
    {
        $marcas = Marca::all();
        return view('admin.modelos.create', compact('marcas'));
    }

    // salva novo modelo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'nome.max' => 'O nome do modelo não pode ter mais de 255 caracteres.',
            'marca_id.required' => 'A marca é obrigatória.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
        ]);

        Modelo::create($validated);

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo criado com sucesso!');
    }

    // mostra um modelo
    public function show(string $id)
    {
        $modelo = Modelo::with('marca')->findOrFail($id);
        return view('admin.modelos.show', compact('modelo'));
    }

    // tela de editar
    public function edit(string $id)
    {
        $modelo = Modelo::findOrFail($id);
        $marcas = Marca::all();
        return view('admin.modelos.edit', compact('modelo', 'marcas'));
    }

    // atualiza modelo
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'nome.max' => 'O nome do modelo não pode ter mais de 255 caracteres.',
            'marca_id.required' => 'A marca é obrigatória.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
        ]);

        $modelo = Modelo::findOrFail($id);
        $modelo->update($validated);

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo atualizado com sucesso!');
    }

    // exclui modelo
    public function destroy(string $id)
    {
        $modelo = Modelo::findOrFail($id);
        $modelo->delete();

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo excluído com sucesso!');
    }
}
