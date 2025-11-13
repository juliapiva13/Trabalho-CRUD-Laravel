@extends('layouts.admin')

@section('title', 'Cores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-palette"></i> Cores</h1>
    <a href="{{ route('admin.cores.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nova Cor
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($cores->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cores as $cor)
                            <tr>
                                <td>{{ $cor->id }}</td>
                                <td>{{ $cor->nome }}</td>
                                <td>{{ $cor->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.cores.edit', $cor->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('admin.cores.destroy', $cor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta cor?');">
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
                <i class="bi bi-info-circle"></i> Nenhuma cor cadastrada.
            </div>
        @endif
    </div>
</div>
@endsection

