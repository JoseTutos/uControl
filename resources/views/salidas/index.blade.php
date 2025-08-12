@extends('layouts.app')
@section('title', 'Salidas')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark fw-bold">Historial de Salidas</h2>
        <a href="{{ route('salidas.create') }}" class="btn btn-primary">Registrar nueva salida</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla con estilo dashboard y centrado -->
    <div class="card shadow-sm border-0">
        <div class="card-header pb-0">
            <h6 class="fw-bold mb-0"></h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            @if($salidas->isEmpty())
                <div class="text-center p-4">
                    <p class="text-muted mb-0">No hay salidas registradas.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 text-center">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Producto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cliente</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Bodega</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cantidad</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Fecha</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Registrado por</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salidas as $salida)
                                <tr>
                                    <td class="text-sm">{{ $salida->existencia->producto->nombre ?? '-' }}</td>
                                    <td class="text-sm">{{ $salida->existencia->cliente->nombre ?? '-' }}</td>
                                    <td class="text-sm">{{ $salida->existencia->bodega->nombre ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-danger text-white">
                                            {{ $salida->cantidad }}
                                        </span>
                                    </td>
                                    <td class="text-sm">{{ $salida->fecha_salida }}</td>
                                    <td class="text-sm">{{ $salida->usuario->name ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('salidas.show', $salida->id) }}" class="btn btn-sm btn-info">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection