@extends('layouts.carbook')

@section('title', 'Registro - Criar Conta')

@section('hero-section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('carbook/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      	<p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('veiculos.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
          <span>Registro <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">Criar Conta</h1>
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
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h3>Criar Nova Conta</h3>
              <p class="text-muted">Preencha os dados abaixo para se cadastrar</p>
            </div>

            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name" class="label">Nome Completo <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="label">E-mail <span class="text-danger">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="telefone" class="label">Telefone</label>
                  <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(00) 00000-0000">
                  @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="password" class="label">Senha <span class="text-danger">*</span></label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="label">Confirmar Senha <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary py-3 px-4 btn-block">
                  Criar Conta
                </button>
              </div>
            </form>
            <div class="text-center mt-3">
              <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login aqui</a></p>
              <p><a href="{{ route('veiculos.index') }}">Voltar ao site</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

