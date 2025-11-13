<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Área Administrativa</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('carbook/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('carbook/css/style.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border-radius: 10px;
        }
        .login-card .card-body {
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <span class="flaticon-car" style="font-size: 3rem; color: #1e3c72;"></span>
                            <h3 class="mt-3">Área Administrativa</h3>
                            <p class="text-muted">Sistema de Venda de Veículos</p>
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

                        <form method="POST" action="{{ route('admin.login.post') }}">
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
                            <p>É comprador? <a href="{{ route('login') }}">Clique aqui</a></p>
                            <p><a href="{{ route('veiculos.index') }}">Voltar ao site</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('carbook/js/jquery.min.js') }}"></script>
    <script src="{{ asset('carbook/js/bootstrap.min.js') }}"></script>
</body>
</html>
