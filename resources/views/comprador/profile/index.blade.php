@extends('layouts.carbook')

@section('title', 'Meu Perfil')

@section('hero-section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('carbook/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      	<p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('veiculos.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
          <span>Meu Perfil <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">Área do Comprador</h1>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-person-circle"></i> Meu Perfil</h4>
          </div>
          <div class="card-body p-4">
            <div class="row mb-4">
              <div class="col-md-12 text-center mb-3">
                <div class="mb-3">
                  <i class="bi bi-person-circle" style="font-size: 4rem; color: #667eea;"></i>
                </div>
                <h3>{{ $user->name }}</h3>
                <p class="text-muted">{{ $user->email }}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <strong>Nome:</strong>
                <p>{{ $user->name }}</p>
              </div>
              <div class="col-md-6 mb-3">
                <strong>E-mail:</strong>
                <p>{{ $user->email }}</p>
              </div>
              <div class="col-md-6 mb-3">
                <strong>Telefone:</strong>
                <p>{{ $user->telefone ?? 'Não informado' }}</p>
              </div>
              <div class="col-md-6 mb-3">
                <strong>Conta criada em:</strong>
                <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
              </div>
            </div>

            <hr>

            <div class="d-flex flex-wrap gap-2">
              <a href="{{ route('comprador.profile.edit') }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Editar Perfil
              </a>
              <a href="{{ route('comprador.profile.change-password') }}" class="btn btn-warning">
                <i class="bi bi-key"></i> Alterar Senha
              </a>
              <a href="{{ route('comprador.profile.delete') }}" class="btn btn-danger">
                <i class="bi bi-trash"></i> Excluir Conta
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

