<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrarse | InventarioZF</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('argon/assets/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link href="{{ asset('argon/assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>
<body class="bg-white">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100" style="background-image: url('{{ asset('argon/assets/img/bd-right.jpg') }}'); background-size: cover;">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column justify-content-center h-100 mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Regístrate</h4>
                  <p class="mb-0">Crea tu cuenta con tus datos</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                      <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Nombre" value="{{ old('name') }}" required autofocus>
                      @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                      @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                      @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Confirmar contraseña -->
                    <div class="mb-3">
                      <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirmar contraseña" required>
                    </div>

                    <!-- Botón -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Registrarse</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Iniciar sesión</a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Imagen lateral -->
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('{{ asset('argon/assets/img/login-bg.jpg') }}'); background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h2 class="mt-5 text-white font-weight-bolder position-relative">uControl</h2>
                <p class="text-white position-relative">Gestiona tus activos con eficiencia y estilo.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- JS -->
  <script src="{{ asset('argon/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>
</html>
