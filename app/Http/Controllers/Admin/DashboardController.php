<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Veiculo;

class DashboardController extends Controller
{
    // dashboard principal
    public function index()
    {
        $stats = [
            'marcas' => Marca::count(),
            'modelos' => Modelo::count(),
            'cores' => Cor::count(),
            'veiculos' => Veiculo::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
