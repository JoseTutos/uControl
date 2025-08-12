@extends('layouts.app')
@section('title', 'Entradas')
@section('breadcrumb-parent', 'Ver todas')


@section('content')
<div class="container-fluid py-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark fw-bold">Historial de Entradas</h2>
        <a href="{{ route('entradas.create') }}" class="btn btn-primary">Registrar nueva entrada</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla con estilo tipo dashboard y centrado -->
    <div class="card shadow-sm border-0">
        <div class="card-header pb-0">
            <h6 class="fw-bold mb-0"></h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            @if($entradas->isEmpty())
                <div class="text-center p-4">
                    <p class="text-muted mb-0">No hay entradas registradas.</p>
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
                            @foreach($entradas as $entrada)
                                <tr>
                                    <td class="text-sm">{{ $entrada->existencia->producto->nombre ?? '-' }}</td>
                                    <td class="text-sm">{{ $entrada->existencia->cliente->nombre ?? '-' }}</td>
                                    <td class="text-sm">{{ $entrada->existencia->bodega->nombre ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $entrada->cantidad }}
                                        </span>
                                    </td>
                                    <td class="text-sm">{{ $entrada->fecha_entrada }}</td>
                                    <td class="text-sm">{{ $entrada->usuario->name ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-sm btn-info">Ver</a>
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