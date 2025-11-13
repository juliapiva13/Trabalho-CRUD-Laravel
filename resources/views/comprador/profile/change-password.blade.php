@extends('layouts.carbook')

@section('title', 'Alterar Senha')

@section('hero-section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('carbook/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      	<p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('veiculos.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
          <span><a href="{{ route('comprador.profile') }}">Meu Perfil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Alterar Senha <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">Alterar Senha</h1>
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
          <div class="card-header bg-warning text-white">
            <h4 class="mb-0"><i class="bi bi-key"></i> Alterar Senha</h4>
          </div>
          <div class="card-body p-4">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('comprador.profile.update-password') }}">
              @csrf
              @method('PUT')
              
              <div class="mb-3">
                <label for="current_password" class="form-label">Senha Atual <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                @error('current_password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="password" class="form-label">Nova Senha <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Nova Senha <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              
              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                  <i class="bi bi-check-circle"></i> Alterar Senha
                </button>
                <a href="{{ route('comprador.profile') }}" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Cancelar
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

