@extends('layouts.app')

@section('title', 'Detalle Existencia')
@section('breadcrumb-parent', 'Existencias')
@section('breadcrumb-current', 'Detalle')

@section('content')
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header">
      <h5>Detalle de Existencia</h5>
    </div>
    <div class="card-body">
      <p><strong>ID:</strong> {{ $existencia->id }}</p>
      <p><strong>Producto:</strong> {{ $existencia->producto->nombre ?? 'N/A' }}</p>
      <p><strong>Cliente:</strong> {{ $existencia->cliente->nombre ?? 'N/A' }}</p>
      <p><strong>Bodega:</strong> {{ $existencia->bodega->nombre ?? 'N/A' }}</p>
      <p><strong>Cantidad Actual:</strong> {{ $existencia->cantidad_actual }}</p>
      <p><strong>Espacio Ocupado:</strong> {{ $existencia->espacio_ocupado }}</p>
      <p><strong>Stock Mínimo:</strong> {{ $existencia->stock_minimo }}</p>
      <p><strong>Creado en:</strong> {{ $existencia->created_at->format('Y-m-d H:i:s') }}</p>
      <p><strong>Actualizado en:</strong> {{ $existencia->updated_at->format('Y-m-d H:i:s') }}</p>
    </div>
    <div class="card-footer">
      <a href="{{ route('existencias.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
  </div>
</div>
@endsection