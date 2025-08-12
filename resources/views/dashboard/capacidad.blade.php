@extends('layouts.app')

@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Capacidad de Espacios Alquilados</h6>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    @foreach ($espacios as $espacio)
      @php
        $capacidad_total = $espacio->capacidad;
        $capacidad_usada = $espacio->existencias->sum(function ($e) {
            return $e->cantidad_actual * $e->capacidad_unitaria;
        });
        $capacidad_libre = $capacidad_total - $capacidad_usada;
      @endphp

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow border-0">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">
              Cliente: {{ $espacio->cliente->nombre }}
            </h5>
            <p class="card-text mb-1"><strong>Bodega:</strong> {{ $espacio->bodega->nombre }}</p>
            <p class="card-text mb-1"><strong>Capacidad Total:</strong> {{ number_format($capacidad_total, 2) }} m²</p>
            <p class="card-text mb-1 text-warning"><strong>Usado:</strong> {{ number_format($capacidad_usada, 2) }} m²</p>
            <p class="card-text mb-0 text-success"><strong>Libre:</strong> {{ number_format($capacidad_libre, 2) }} m²</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection