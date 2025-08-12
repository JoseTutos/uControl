@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6>Listado de Productos</h6>
          <a href="{{ route('productos.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Nuevo Producto
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoría</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unidad</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor Unitario</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IVA (%)</th>
                  <th class="text-secondary opacity-7 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productos as $producto)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1 justify-content-center">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $producto->nombre }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $producto->codigo_producto }}</p>
                  </td>
                  <td>
                    <p class="text-xs text-secondary mb-0">{{ $producto->descripcion }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $producto->categoria->nombre ?? '-' }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $producto->unidad_medida }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">${{ number_format($producto->valor_unitario, 2) }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $producto->iva }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <a href="{{ route('productos.show', $producto->id) }}" class="text-info font-weight-bold text-xs me-2">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="text-warning font-weight-bold text-xs me-2">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este producto?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-xs p-0 m-0">Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection