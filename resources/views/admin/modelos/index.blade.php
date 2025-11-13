@extends('layouts.admin')

@section('title', 'Modelos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-tags"></i> Modelos</h1>
    <a href="{{ route('admin.modelos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Modelo
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($modelos->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modelos as $modelo)
                            <tr>
                                <td>{{ $modelo->id }}</td>
                                <td>{{ $modelo->nome }}</td>
                                <td>{{ $modelo->marca->nome }}</td>
                                <td>{{ $modelo->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.modelos.edit', $modelo->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('admin.modelos.destroy', $modelo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este modelo?');">
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
                <i class="bi bi-info-circle"></i> Nenhum modelo cadastrado.
            </div>
        @endif
    </div>
</div>
@endsection

