@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <h5><i class="bi bi-tag"></i> Marcas Cadastradas</h5>
            <h2>{{ $stats['marcas'] }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card success">
            <h5><i class="bi bi-tags"></i> Modelos Cadastrados</h5>
            <h2>{{ $stats['modelos'] }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card info">
            <h5><i class="bi bi-palette"></i> Cores Disponíveis</h5>
            <h2>{{ $stats['cores'] }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card warning">
            <h5><i class="bi bi-car-front"></i> Veículos em Estoque</h5>
            <h2>{{ $stats['veiculos'] }}</h2>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Bem-vindo à Área Administrativa!</h5>
        <p class="card-text">Use o menu lateral para gerenciar marcas, modelos, cores e veículos.</p>
        <a href="{{ route('admin.veiculos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Adicionar Novo Veículo
        </a>
    </div>
</div>
@endsection

