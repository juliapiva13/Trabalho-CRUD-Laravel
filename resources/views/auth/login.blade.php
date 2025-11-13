@extends('layouts.carbook')

@section('title', 'Login - Área do Comprador')

@section('hero-section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('carbook/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      	<p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('veiculos.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
          <span>Login <i class="ion-ios-arrow-forward"></i></span>
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h3>Login - Área do Comprador</h3>
              <p class="text-muted">Faça login para acessar sua conta</p>
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

            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <label for="email" class="label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="password" class="label">Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <div class="checkbox-wrap checkbox-primary">
                  <label for="remember" style="cursor: pointer;">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    Lembrar-me
                  </label>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary py-3 px-4 btn-block">
                  Entrar
                </button>
              </div>
            </form>
            <div class="text-center mt-3">
              <p>Não tem uma conta? <a href="{{ route('register') }}">Criar conta aqui</a></p>
              <p>É administrador? <a href="{{ route('admin.login') }}">Clique aqui</a></p>
              <p><a href="{{ route('veiculos.index') }}">Voltar ao site</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

