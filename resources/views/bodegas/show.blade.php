@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header pb-0">
          <h5>Detalle de la Bodega</h5>
        </div>
        <div class="card-body">
          <p><strong>ID:</strong> {{ $bodega->id }}</p>
          <p><strong>Nombre:</strong> {{ $bodega->nombre }}</p>
          <p><strong>Ubicación:</strong> {{ $bodega->ubicacion }}</p>
          <p><strong>Capacidad:</strong> {{ $bodega->capacidad }} m²</p>
          <p><strong>Estado:</strong> {{ $bodega->estado }}</p>

          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('bodegas.index') }}" class="btn btn-outline-dark">← Volver</a>
            <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-warning">Editar</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection