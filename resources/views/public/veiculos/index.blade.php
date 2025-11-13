@extends('layouts.carbook')

@section('title', 'Veículos Disponíveis')

@section('hero-section')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('carbook/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
      	<div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Encontre o Veículo Perfeito Para Você</h1>
          <p style="font-size: 18px;">Os melhores carros com os melhores preços. Navegue pela nossa seleção de veículos disponíveis.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <!-- Área de Filtros -->
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h4 class="mb-4">Filtrar Veículos</h4>
            <form method="GET" action="{{ route('veiculos.index') }}">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label class="form-label">Marca</label>
                  <select name="marca_id" class="form-control">
                    <option value="">Todas as marcas</option>
                    @foreach($marcas as $marca)
                      <option value="{{ $marca->id }}" {{ request('marca_id') == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nome }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label class="form-label">Modelo</label>
                  <select name="modelo_id" class="form-control">
                    <option value="">Todos os modelos</option>
                    @foreach($modelos as $modelo)
                      <option value="{{ $modelo->id }}" {{ request('modelo_id') == $modelo->id ? 'selected' : '' }}>
                        {{ $modelo->nome }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label class="form-label">Cor</label>
                  <select name="cor_id" class="form-control">
                    <option value="">Todas as cores</option>
                    @foreach($cores as $cor)
                      <option value="{{ $cor->id }}" {{ request('cor_id') == $cor->id ? 'selected' : '' }}>
                        {{ $cor->nome }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label class="form-label">Ano Mínimo</label>
                  <input type="number" name="ano_min" class="form-control" placeholder="Ex: 2010" value="{{ request('ano_min') }}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label class="form-label">Ano Máximo</label>
                  <input type="number" name="ano_max" class="form-control" placeholder="Ex: 2024" value="{{ request('ano_max') }}">
                </div>
                <div class="col-md-3 mb-3">
                  <label class="form-label">Valor Mínimo (R$)</label>
                  <input type="number" name="valor_min" class="form-control" placeholder="Ex: 20000" value="{{ request('valor_min') }}">
                </div>
                <div class="col-md-3 mb-3">
                  <label class="form-label">Valor Máximo (R$)</label>
                  <input type="number" name="valor_max" class="form-control" placeholder="Ex: 100000" value="{{ request('valor_max') }}">
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-end">
                  <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
              </div>
              @if(request('marca_id') || request('modelo_id') || request('cor_id') || request('ano_min') || request('ano_max') || request('valor_min') || request('valor_max'))
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{ route('veiculos.index') }}" class="btn btn-secondary btn-sm">Limpar Filtros</a>
                  </div>
                </div>
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Veículos Disponíveis</span>
        <h2 class="mb-2">Nossa Frota</h2>
        @if(request('marca_id') || request('modelo_id') || request('cor_id') || request('ano_min') || request('ano_max') || request('valor_min') || request('valor_max'))
          <p class="text-muted">Mostrando {{ $veiculos->count() }} veículo(s) encontrado(s)</p>
        @endif
      </div>
    </div>
    @if($veiculos->count() > 0)
      <div class="row">
        @foreach($veiculos as $veiculo)
          <div class="col-md-4">
            <div class="car-wrap rounded ftco-animate">
              <div class="img rounded d-flex align-items-end" style="background-image: url('{{ $veiculo->foto_principal }}'); background-size: cover; background-position: center;" onerror="this.style.backgroundImage='url({{ asset('carbook/images/car-1.jpg') }})'">
              </div>
              <div class="text">
                <h2 class="mb-0"><a href="{{ route('veiculos.show', $veiculo->id) }}">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</a></h2>
                <div class="d-flex mb-3">
                  <span class="cat" style="color: #333; font-weight: 500;">{{ $veiculo->cor->nome }}</span>
                  <p class="price ml-auto">R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</p>
                </div>
                <p class="d-flex mb-0 d-block">
                  <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-primary py-2 mr-1">Ver Detalhes</a>
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="lead">Nenhum veículo disponível no momento.</p>
        </div>
      </div>
    @endif
  </div>
</section>
@endsection
