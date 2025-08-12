<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">

{{-- Breadcrumb y título --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Inicio</a>
    </li>

    @if(View::hasSection('breadcrumb-parent'))
      <li class="breadcrumb-item text-sm text-dark">
        @yield('breadcrumb-parent')
      </li>
    @elseif(isset($breadcrumbParent) && $breadcrumbParent)
      <li class="breadcrumb-item text-sm text-dark">
        {{ $breadcrumbParent }}
      </li>
    @endif

    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      @yield('title', 'Dashboard')
    </li>
  </ol>
  <h6 class="font-weight-bolder mb-0">@yield('title', 'Dashboard')</h6>
</nav>

    <ul class="navbar-nav justify-content-end">

    {{-- Nombre del usuario logueado --}}
    @if(Auth::check())
      <li class="nav-item d-flex align-items-center">
        <a href="{{ route('profile.edit') }}" class="nav-link text-dark fw-semibold px-2">
          <i class="fa fa-user me-1"></i>
          {{ Auth::user()->name ?? 'Sin nombre' }}
        </a>
      </li>
    @endif

      {{-- Sidenav toggler (para pantallas pequeñas) --}}
      <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
        <a href="#" class="nav-link text-body p-0" id="iconNavbarSidenav">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </a>
      </li>

      {{-- Logout --}}
      <li class="nav-item d-flex align-items-center ms-3">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-dark btn-sm">Cerrar sesión</button>
        </form>
      </li>

    </ul>
  </div>
</nav>