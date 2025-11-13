<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    // lista todos os veículos com filtros
    public function index(Request $request)
    {
        $query = Veiculo::with(['marca', 'modelo', 'cor']);

        // filtros
        if ($request->filled('marca_id')) {
            $query->where('marca_id', $request->marca_id);
        }

        if ($request->filled('modelo_id')) {
            $query->where('modelo_id', $request->modelo_id);
        }

        if ($request->filled('cor_id')) {
            $query->where('cor_id', $request->cor_id);
        }

        if ($request->filled('ano_min')) {
            $query->where('ano_fabricacao', '>=', $request->ano_min);
        }

        if ($request->filled('ano_max')) {
            $query->where('ano_fabricacao', '<=', $request->ano_max);
        }

        if ($request->filled('valor_min')) {
            $query->where('valor', '>=', $request->valor_min);
        }

        if ($request->filled('valor_max')) {
            $query->where('valor', '<=', $request->valor_max);
        }

        $veiculos = $query->latest()->get();

        // dados para os selects
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();

        return view('public.veiculos.index', compact('veiculos', 'marcas', 'modelos', 'cores'));
    }

    // mostra detalhes de um veículo
    public function show($id)
    {
        $veiculo = Veiculo::with(['marca', 'modelo', 'cor'])->findOrFail($id);
        return view('public.veiculos.show', compact('veiculo'));
    }
}
