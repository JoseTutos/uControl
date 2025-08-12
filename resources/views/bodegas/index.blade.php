@extends('layouts.app')
@section('title', 'Bodegas')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6></h6>
          <a href="{{ route('bodegas.create') }}" class="btn btn-sm btn-primary">+ Nueva Bodega</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center"> {{-- Aquí text-center --}}
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Bodega</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Ubicación</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Capacidad (m²)</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Estado</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Uso (%)</th>
                  <th class="text-secondary opacity-7 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bodegas as $bodega)
                @php
                  $capacidadTotal = $bodega->capacidad ?? 1;
                  $capacidadArrendada = optional($bodega->existencias)->sum('espacio_ocupado') ?? 0;
                  $porcentajeUso = $capacidadTotal > 0 ? min(100, ($capacidadArrendada / $capacidadTotal) * 100) : 0;
                @endphp
                <tr>
                  <td>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <h6 class="mb-0 text-sm">{{ $bodega->nombre }}</h6>
                      <p class="text-xs text-secondary mb-0">ID: {{ $bodega->id }}</p>
                    </div>
                  </td>
                  <td class="align-middle">{{ $bodega->ubicacion }}</td>
                  <td class="align-middle">{{ number_format($bodega->capacidad, 2) }}</td>
                  <td class="align-middle">
                    <span class="badge bg-gradient-{{ $bodega->estado == 'activa' ? 'success' : 'secondary' }}">{{ ucfirst($bodega->estado) }}</span>
                  </td>
                  <td class="align-middle">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold">{{ number_format($porcentajeUso, 0) }}%</span>
                      <div>
                        <div class="progress" style="height: 10px; width: 100px;">
                          <div class="progress-bar bg-gradient-info" role="progressbar" style="width: {{ $porcentajeUso }}%;" aria-valuenow="{{ $porcentajeUso }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('bodegas.show', $bodega->id) }}" class="text-info font-weight-bold text-xs me-2">Ver</a>
                    <a href="{{ route('bodegas.edit', $bodega->id) }}" class="text-warning font-weight-bold text-xs me-2">Editar</a>
                    <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-xs p-0 m-0" onclick="return confirm('¿Estás seguro de eliminar esta bodega?')">Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="mt-4 ms-3">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">← Regresar al Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection