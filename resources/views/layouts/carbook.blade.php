<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>@yield('title', 'Sistema de Venda de Veículos') - CarBook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('carbook/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('carbook/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('carbook/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('carbook/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('carbook/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('carbook/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    @yield('styles')
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('veiculos.index') }}">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{ request()->routeIs('veiculos.index') ? 'active' : '' }}"><a href="{{ route('veiculos.index') }}" class="nav-link">Home</a></li>
          @auth
            @if(Auth::user()->isAdmin())
              <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Painel Administrativo</a></li>
              <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="nav-link btn btn-link text-white border-0 p-2" style="background: none; cursor: pointer; text-decoration: none;">Sair</button>
                </form>
              </li>
            @else
              <li class="nav-item"><a href="{{ route('comprador.profile') }}" class="nav-link">Meu Perfil</a></li>
              <li class="nav-item"><span class="nav-link">Olá, {{ Auth::user()->name }}</span></li>
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="nav-link btn btn-link text-white border-0 p-2" style="background: none; cursor: pointer; text-decoration: none;">Sair</button>
                </form>
              </li>
            @endif
          @else
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Criar Conta</a></li>
          <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">Área Admin</a></li>
          @endauth
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    @yield('hero-section')

    @if(session('success'))
      <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if(session('error'))
      <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @yield('content')

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <p>Sistema de venda de veículos - Trabalho acadêmico desenvolvido em Laravel.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Informações</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('veiculos.index') }}" class="py-2 d-block">Home</a></li>
                @auth
                <li><a href="{{ route('admin.dashboard') }}" class="py-2 d-block">Dashboard</a></li>
                @else
                <li><a href="{{ route('login') }}" class="py-2 d-block">Login</a></li>
                @endauth
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Suporte</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Contato</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contato</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Sistema de Venda de Veículos</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+00 0000-0000</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contato@autovendas.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Sistema de Venda de Veículos
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('carbook/js/jquery.min.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('carbook/js/popper.min.js') }}"></script>
  <script src="{{ asset('carbook/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('carbook/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('carbook/js/aos.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('carbook/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('carbook/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('carbook/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('carbook/js/main.js') }}"></script>
  
  @yield('scripts')
    
  </body>
</html>

