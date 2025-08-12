@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detalle de Entrada</h1>

    <div class="card">
        <div class="card-body">

            <p><strong>Producto:</strong> {{ $entrada->existencia->producto->nombre ?? '-' }}</p>
            <p><strong>Cliente:</strong> {{ $entrada->existencia->cliente->nombre ?? '-' }}</p>
            <p><strong>Bodega:</strong> {{ $entrada->existencia->bodega->nombre ?? '-' }}</p>
            <p><strong>Espacio Ocupado:</strong> {{ $entrada->existencia->espacio_ocupado }} m²</p>
            <p><strong>Cantidad:</strong> {{ $entrada->cantidad }}</p>
            <p><strong>Fecha de Entrada:</strong> {{ $entrada->fecha_entrada }}</p>
            <p><strong>Observaciones:</strong> {{ $entrada->observaciones ?? 'Ninguna' }}</p>
            <p><strong>Registrado por:</strong> {{ $entrada->usuario->name ?? '-' }}</p>

            <a href="{{ route('entradas.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection