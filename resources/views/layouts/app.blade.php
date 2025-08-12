<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('argon/assets/img/favicon.png') }}">

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- CSS Argon Dashboard -->
  <link href="{{ asset('argon/assets/css/argon-dashboard.css') }}" rel="stylesheet">

  <!-- Estilos personalizados -->
  <style>

    .navbar .nav-link {
    font-size: 1rem;
    color: #c6cbe9ff !important;
    font-weight: 600;
  }

     body {
    overflow-x: hidden;
  }
    /* Cambiar color del sidebar */
    .g-sidenav {
      background-color: #e5f0faff !important; /* Celeste suave */
    }

    .nav-link {
      color: #fcfdfdff !important;
    }

    .nav-link.active {
      background-color: #b2ebf2 !important;
      color: #c3d3fdff !important;
      font-weight: bold;
    }

    .nav-link i {
      margin-right: 8px;
    }

    a[data-bs-toggle="collapse"]::after {
    display: none !important;
    }
  </style>

  @stack('styles')
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="g-sidenav-show bg-gray-100">

  <!-- Franja oscura superior -->
  <div class="min-height-300 position-absolute w-100 border-radius-xl" style="background-color: #4469faf5;"></div>

  <!-- Sidebar -->
  @include('partials.sidebar')

  <main class="main-content position-relative border-radius-lg">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Contenido principal -->
    <div class="container-fluid py-4">
      @yield('content')
    </div>

  </main>

  <!-- Scripts -->
  <script src="{{ asset('argon/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js') }}"></script>

  @stack('scripts')
  @stack('js')
</body>
</html>