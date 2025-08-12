<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  body {
  margin-left: 100px; /* Igual al ancho del sidebar */
  }

  /* Estilo general del sidebar */
  #sidenav-main {
  position: fixed;
  top: 0;
  left: 0;
  width: 300px;
  height: 100vh;
  overflow-y: auto;
  z-index: 1030;

  background-color: #384163ff !important;
  font-family: 'Poppins', sans-serif;
  color: #F3F4F6 !important;

  border-radius: 0 !important;
  margin: 0 !important;
  padding: 0 !important;
  }

  /* Ítems del menú */
  #sidenav-main .nav-link {
    color: #F3F4F6 !important;
    font-weight: 600;
    font-size: 15px;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease;
  }

  /* Hover y activo */
  #sidenav-main .nav-link:hover,
  #sidenav-main .nav-link.active {
    background-color: #374151 !important; /* Azul gris medio */
    border-radius: 8px;
    color: #ffffff !important;
  }

  /* Íconos */
  #sidenav-main .icon img {
    filter: none;
    max-height: 20px;
    margin-right: 10px;
  }

  /* Texto del ítem */
  .nav-link-text {
    margin-left: 5px;
  }

  /* Encabezado de sección */
  #sidenav-main h6 {
    color: #94A3B8 !important; /* Gris claro */
    font-size: 12px;
    margin-top: 20px;
    margin-left: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* Submenús */
  #sidenav-main .collapse .nav-link {
    font-size: 14px;
    font-weight: 400;
    padding-left: 30px;
  }

  /* Quitar margen lateral del sidebar */
  .fixed-start.ms-4 {
    margin-left: 0 !important;
  }
</style>


<!-- Sidebar estilo Argon con Blade -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start" id="sidenav-main">
  <div class="sidenav-header d-flex justify-content-center">
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
      <img src="{{ asset('argon/assets/img/logo.png') }}" class="navbar-brand-img" alt="Logo" style="max-height: 50px;">
    </a>
  </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/informe.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Dashboard</span>
        </a>
      </li>

            <!-- Bodegas -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('bodegas*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#collapseBodegas" aria-expanded="{{ request()->is('bodegas*') ? 'true' : 'false' }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/bodega.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Bodegas</span>
        </a>
        <div id="collapseBodegas" class="collapse {{ request()->is('bodegas*') ? 'show' : '' }}" data-bs-parent="#sidenav-collapse-main">
          <ul class="nav ms-4">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('bodegas.index') ? 'active' : '' }}" href="{{ route('bodegas.index') }}">Ver todas</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('bodegas.create') ? 'active' : '' }}" href="{{ route('bodegas.create') }}">Crear</a></li>
          </ul>
        </div>
      </li>


      <!-- Categorías -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('categorias*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#collapseCategorias" aria-expanded="{{ request()->is('categorias*') ? 'true' : 'false' }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/categoria.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Categorías</span>
        </a>
        <div id="collapseCategorias" class="collapse {{ request()->is('categorias*') ? 'show' : '' }}" data-bs-parent="#sidenav-collapse-main">
          <ul class="nav ms-4">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Ver todas</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('categorias.create') ? 'active' : '' }}" href="{{ route('categorias.create') }}">Crear</a></li>
          </ul>
        </div>
      </li>

      <!-- Productos -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('productos*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#collapseProductos" aria-expanded="{{ request()->is('productos*') ? 'true' : 'false' }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/producto.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Productos</span>
        </a>
        <div id="collapseProductos" class="collapse {{ request()->is('productos*') ? 'show' : '' }}" data-bs-parent="#sidenav-collapse-main">
          <ul class="nav ms-4">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}" href="{{ route('productos.index') }}">Ver todos</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('productos.create') ? 'active' : '' }}" href="{{ route('productos.create') }}">Crear</a></li>
          </ul>
        </div>
      </li>

      <!-- Clientes -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('clientes*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#collapseClientes" aria-expanded="{{ request()->is('clientes*') ? 'true' : 'false' }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/cliente.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Clientes</span>
        </a>
        <div id="collapseClientes" class="collapse {{ request()->is('clientes*') ? 'show' : '' }}" data-bs-parent="#sidenav-collapse-main">
          <ul class="nav ms-4">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('clientes.index') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Ver todos</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('clientes.create') ? 'active' : '' }}" href="{{ route('clientes.create') }}">Crear</a></li>
          </ul>
        </div>
      </li>

      <!-- Sección personalizada -->
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Operaciones</h6>
      </li>

      <!-- Entradas -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('entradas*') ? 'active' : '' }}" href="{{ route('entradas.index') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/entrada.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Entradas</span>
        </a>
      </li>

      <!-- Salidas -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('salidas*') ? 'active' : '' }}" href="{{ route('salidas.index') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/salida.png') }}" alt="Icono" style="max-height: 20px;">
          </div>
          <span class="nav-link-text ms-1 fw-bold fs-6">Salidas</span>
        </a>
      </li> 

    <li class="nav-item">
      <a class="nav-link {{ request()->is('existencias*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#collapseExistencias" aria-expanded="{{ request()->is('existencias*') ? 'true' : 'false' }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('argon/assets/img/existencia.png') }}" alt="Icono" style="max-height: 20px;">
        </div>
        <span class="nav-link-text ms-1 fw-bold fs-6">Ingreso</span>
      </a>
      <div id="collapseExistencias" class="collapse {{ request()->is('existencias*') ? 'show' : '' }}" data-bs-parent="#sidenav-collapse-main">
        <ul class="nav ms-4">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('existencias.create') ? 'active' : '' }}" href="{{ route('existencias.create') }}">
              <span class="nav-link-text">Nuevo Ingreso</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('existencias.index') ? 'active' : '' }}" href="{{ route('existencias.index') }}">
              <span class="nav-link-text">Ver Existencias</span>
            </a>
          </li>
        </ul>
      </div>
    </ul>
  </div>
</aside>