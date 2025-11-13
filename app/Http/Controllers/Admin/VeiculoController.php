<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    // lista veículos
    public function index()
    {
        $veiculos = Veiculo::with(['marca', 'modelo', 'cor'])->latest()->get();
        return view('admin.veiculos.index', compact('veiculos'));
    }

    // tela de criar veículo
    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();
        return view('admin.veiculos.create', compact('marcas', 'modelos', 'cores'));
    }

    // salva novo veículo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano_fabricacao' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'foto_principal' => 'required|url',
            'foto_2' => 'required|url',
            'foto_3' => 'required|url',
            'foto_4' => 'nullable|url',
        ], [
            'marca_id.required' => 'A marca é obrigatória.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
            'modelo_id.required' => 'O modelo é obrigatório.',
            'modelo_id.exists' => 'O modelo selecionado é inválido.',
            'cor_id.required' => 'A cor é obrigatória.',
            'cor_id.exists' => 'A cor selecionada é inválida.',
            'ano_fabricacao.required' => 'O ano de fabricação é obrigatório.',
            'ano_fabricacao.integer' => 'O ano de fabricação deve ser um número inteiro.',
            'ano_fabricacao.min' => 'O ano de fabricação deve ser no mínimo 1900.',
            'ano_fabricacao.max' => 'O ano de fabricação não pode ser maior que ' . (date('Y') + 1) . '.',
            'quilometragem.required' => 'A quilometragem é obrigatória.',
            'quilometragem.integer' => 'A quilometragem deve ser um número inteiro.',
            'quilometragem.min' => 'A quilometragem deve ser no mínimo 0.',
            'valor.required' => 'O valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor deve ser no mínimo 0.',
            'foto_principal.required' => 'A foto principal é obrigatória.',
            'foto_principal.url' => 'A foto principal deve ser uma URL válida.',
            'foto_2.url' => 'A foto 2 deve ser uma URL válida.',
            'foto_3.url' => 'A foto 3 deve ser uma URL válida.',
            'foto_4.url' => 'A foto 4 deve ser uma URL válida.',
        ]);

        Veiculo::create($validated);

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo criado com sucesso!');
    }

    // mostra um veículo
    public function show(string $id)
    {
        $veiculo = Veiculo::with(['marca', 'modelo', 'cor'])->findOrFail($id);
        return view('admin.veiculos.show', compact('veiculo'));
    }

    // tela de editar
    public function edit(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();
        return view('admin.veiculos.edit', compact('veiculo', 'marcas', 'modelos', 'cores'));
    }

    // atualiza veículo
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano_fabricacao' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'foto_principal' => 'required|url',
            'foto_2' => 'required|url',
            'foto_3' => 'required|url',
            'foto_4' => 'nullable|url',
        ], [
            'marca_id.required' => 'A marca é obrigatória.',
            'marca_id.exists' => 'A marca selecionada é inválida.',
            'modelo_id.required' => 'O modelo é obrigatório.',
            'modelo_id.exists' => 'O modelo selecionado é inválido.',
            'cor_id.required' => 'A cor é obrigatória.',
            'cor_id.exists' => 'A cor selecionada é inválida.',
            'ano_fabricacao.required' => 'O ano de fabricação é obrigatório.',
            'ano_fabricacao.integer' => 'O ano de fabricação deve ser um número inteiro.',
            'ano_fabricacao.min' => 'O ano de fabricação deve ser no mínimo 1900.',
            'ano_fabricacao.max' => 'O ano de fabricação não pode ser maior que ' . (date('Y') + 1) . '.',
            'quilometragem.required' => 'A quilometragem é obrigatória.',
            'quilometragem.integer' => 'A quilometragem deve ser um número inteiro.',
            'quilometragem.min' => 'A quilometragem deve ser no mínimo 0.',
            'valor.required' => 'O valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor deve ser no mínimo 0.',
            'foto_principal.required' => 'A foto principal é obrigatória.',
            'foto_principal.url' => 'A foto principal deve ser uma URL válida.',
            'foto_2.required' => 'A foto 2 é obrigatória (mínimo de 3 fotos necessário).',
            'foto_2.url' => 'A foto 2 deve ser uma URL válida.',
            'foto_3.required' => 'A foto 3 é obrigatória (mínimo de 3 fotos necessário).',
            'foto_3.url' => 'A foto 3 deve ser uma URL válida.',
            'foto_4.url' => 'A foto 4 deve ser uma URL válida.',
        ]);

        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($validated);

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    // exclui veículo
    public function destroy(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}
