@extends('layouts.admin')

@section('title', 'Editar Veículo')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-car-front"></i> Editar Veículo</h1>
    <a href="{{ route('admin.veiculos.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.veiculos.update', $veiculo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca_id" class="form-label">Marca <span class="text-danger">*</span></label>
                    <select class="form-select @error('marca_id') is-invalid @enderror" id="marca_id" name="marca_id" required>
                        <option value="">Selecione uma marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id', $veiculo->marca_id) == $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                    @error('marca_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="modelo_id" class="form-label">Modelo <span class="text-danger">*</span></label>
                    <select class="form-select @error('modelo_id') is-invalid @enderror" id="modelo_id" name="modelo_id" required>
                        <option value="">Selecione um modelo</option>
                        @foreach($modelos as $modelo)
                            <option value="{{ $modelo->id }}" {{ old('modelo_id', $veiculo->modelo_id) == $modelo->id ? 'selected' : '' }}>{{ $modelo->nome }}</option>
                        @endforeach
                    </select>
                    @error('modelo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="cor_id" class="form-label">Cor <span class="text-danger">*</span></label>
                    <select class="form-select @error('cor_id') is-invalid @enderror" id="cor_id" name="cor_id" required>
                        <option value="">Selecione uma cor</option>
                        @foreach($cores as $cor)
                            <option value="{{ $cor->id }}" {{ old('cor_id', $veiculo->cor_id) == $cor->id ? 'selected' : '' }}>{{ $cor->nome }}</option>
                        @endforeach
                    </select>
                    @error('cor_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ano_fabricacao" class="form-label">Ano de Fabricação <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('ano_fabricacao') is-invalid @enderror" id="ano_fabricacao" name="ano_fabricacao" value="{{ old('ano_fabricacao', $veiculo->ano_fabricacao) }}" min="1900" max="{{ date('Y') + 1 }}" required>
                    @error('ano_fabricacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="quilometragem" class="form-label">Quilometragem <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('quilometragem') is-invalid @enderror" id="quilometragem" name="quilometragem" value="{{ old('quilometragem', $veiculo->quilometragem) }}" min="0" required>
                    @error('quilometragem')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor (R$) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{ old('valor', $veiculo->valor) }}" min="0" required>
                @error('valor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="4">{{ old('descricao', $veiculo->descricao) }}</textarea>
                @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="foto_principal" class="form-label">Foto Principal (URL) <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('foto_principal') is-invalid @enderror" id="foto_principal" name="foto_principal" value="{{ old('foto_principal', $veiculo->foto_principal) }}" required>
                    @error('foto_principal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="foto_2" class="form-label">Foto 2 (URL) <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('foto_2') is-invalid @enderror" id="foto_2" name="foto_2" value="{{ old('foto_2', $veiculo->foto_2) }}" required>
                    @error('foto_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="foto_3" class="form-label">Foto 3 (URL) <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('foto_3') is-invalid @enderror" id="foto_3" name="foto_3" value="{{ old('foto_3', $veiculo->foto_3) }}" required>
                    @error('foto_3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="foto_4" class="form-label">Foto 4 (URL)</label>
                    <input type="url" class="form-control @error('foto_4') is-invalid @enderror" id="foto_4" name="foto_4" value="{{ old('foto_4', $veiculo->foto_4) }}">
                    @error('foto_4')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Atualizar
            </button>
        </form>
    </div>
</div>
@endsection

