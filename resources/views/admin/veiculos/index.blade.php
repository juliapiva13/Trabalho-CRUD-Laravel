@extends('layouts.admin')

@section('title', 'Veículos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-car-front"></i> Veículos</h1>
    <a href="{{ route('admin.veiculos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Veículo
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($veiculos->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Marca/Modelo</th>
                            <th>Cor</th>
                            <th>Ano</th>
                            <th>Km</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($veiculos as $veiculo)
                            <tr>
                                <td>
                                    <img src="{{ $veiculo->foto_principal }}" alt="Foto" style="width: 80px; height: 60px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/80x60?text=Sem+Imagem'">
                                </td>
                                <td>{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</td>
                                <td>{{ $veiculo->cor->nome }}</td>
                                <td>{{ $veiculo->ano_fabricacao }}</td>
                                <td>{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</td>
                                <td>R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('admin.veiculos.edit', $veiculo->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('admin.veiculos.destroy', $veiculo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este veículo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Nenhum veículo cadastrado.
            </div>
        @endif
    </div>
</div>
@endsection

