<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('argon/assets/img/favicon.png') }}">
  <title>Login | InventarioZF</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Argon CSS -->
  <link id="pagestyle" href="{{ asset('argon/assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

  <!-- Custom styles -->
  <style>
    .login-card {
      background-color: white;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .full-height {
      height: 100vh;
    }

    .bg-cover {
      background-size: cover;
      background-position: center;
    }

    .custom-gradient {
    background: linear-gradient(to right, #3872f0ff); /* Naranja a amarillo */
    background-size: cover;
    background-position: center;
    }
  </style>
</head>

<body class="bg-white">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100 bg-cover" style="background-image: url('{{ asset('argon/assets/img/bd-right.jpg') }}');">
        <div class="container">
          <div class="row">
            <!-- Columna del formulario -->
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column justify-content-center h-100 mx-0">
            <div class="login-box p-4 rounded shadow">  
            <div class="card card-plain login-card">
                <div class="card-header pb-0 text-start bg-white border-0">
                  <h4 class="font-weight-bolder">Iniciar sesión</h4>
                  <p class="mb-0">Introduce tu email y contraseña para iniciar sesión</p>
                </div>
                <div class="card-body bg-white border-0">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                      <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Correo electrónico"
                        required autofocus>
                      @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                      <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        placeholder="Contraseña"
                        required>
                      @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Recordarme -->
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                      <label class="form-check-label" for="remember_me">Recordarme</label>
                    </div>

                    <!-- Botón -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Iniciar sesión</button>
                    </div>
                  </form>
                </div>
                
                <div class="card-header text-center border-0 bg-white mt-3">
                  <p class="text-sm">
                    @if (Route::has('password.request'))              
                      <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">
                        ¿Olvidaste tu contraseña?
                      </a>
                    @endif
                  </p>
                </div>
                
                <div class="card-footer text-center border-0 bg-white mt-3">
                  <p class="text-sm">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Regístrate</a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Imagen lateral -->
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 mx-3 px-7 d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('{{ asset('argon/assets/img/login-bg.jpg') }}'); background-size: cover;">
                <span class="mask bg-cover custom-gradient opacity-3"></span>
                <h1 class="mt-5 text-white font-weight-bolder position-relative">uControl</h1>
                <p class="text-white position-relative">Tu aliado confiable en la gestión inteligente de activos y procesos.</p>
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
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>
</html>

            <!-- Imagen lateral -->
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('{{ asset('argon/assets/img/login-bg.jpg') }}'); background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h2 class="mt-5 text-white font-weight-bolder position-relative">uControl</h2>
                <p class="text-white position-relative">Tu aliado confiable en la gestión inteligente de activos y procesos.</p>
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
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>
</html>