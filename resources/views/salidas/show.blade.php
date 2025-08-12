@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detalle de Salida</h1>

    <div class="card shadow">
        <div class="card-body">
            <p><strong>Producto:</strong> {{ $salida->producto->nombre }}</p>
            <p><strong>Cliente:</strong> {{ $salida->cliente->nombre }}</p>
            <p><strong>Bodega:</strong> {{ $salida->bodega->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $salida->cantidad }}</p>
            <p><strong>Observaciones:</strong> {{ $salida->observaciones ?? 'N/A' }}</p>
            <p><strong>Fecha:</strong> {{ $salida->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Registrado por:</strong> {{ $salida->usuario->name }}</p>
        </div>
    </div>

    <a href="{{ route('salidas.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection