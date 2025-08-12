@extends('layouts.app')
@section('title', 'Existencias')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-2 ps-1">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
          <h6 class="mb-0 fw-bold">Existencias</h6>
          <div class="d-flex gap-2">

            <div class="mb-3">
              <a href="{{ route('existencias.exportExcel') }}" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Exportar Excel
              </a>
            </div>

            {{-- Botón Nueva existencia --}}
            <a href="{{ route('existencias.create') }}" 
               class="btn btn-sm btn-primary d-flex align-items-center shadow-sm">
              <i class="fas fa-plus me-1"></i> Nueva existencia
            </a>
          </div>
        </div>
        
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center text-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cliente</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bodega</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cantidad</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Espacio ocupado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($existencias as $e)
                <tr>
                  <td class="align-middle">
                    <h6 class="mb-0 text-sm">{{ $e->producto->nombre }}</h6>
                  </td>
                  <td class="align-middle">
                    <p class="text-sm font-weight-bold mb-0">{{ $e->cliente->nombre }}</p>
                  </td>
                  <td class="align-middle">
                    <p class="text-sm font-weight-bold mb-0">{{ $e->bodega->nombre }}</p>
                  </td>
                  <td class="align-middle text-center">
                    @php
                      if ($e->cantidad_actual <= $e->stock_minimo) {
                          $badgeColor = 'info'; // celeste
                      } elseif ($e->cantidad_actual <= $e->stock_minimo + 10) {
                          $badgeColor = 'warning'; // amarillo
                      } else {
                          $badgeColor = 'success'; // verde
                      }
                    @endphp
                    <span class="badge badge-sm bg-gradient-{{ $badgeColor }}">
                      {{ $e->cantidad_actual }}
                    </span>
                    <p class="text-xs text-secondary mb-0">Stock mín: {{ $e->stock_minimo }}</p>
                  </td>
                  <td class="align-middle text-center">
                    {{ number_format($e->espacio_ocupado, 2) }} m²
                  </td>
                  <td class="align-middle text-center">
                    <a href="{{ route('existencias.show', $e->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" title="Ver">
                      Ver
                    </a>
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