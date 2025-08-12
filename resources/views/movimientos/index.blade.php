@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Historial de Movimientos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('movimientos.export') }}" class="btn btn-sm btn-outline-success">
            <i class="fas fa-file-csv"></i> Exportar CSV
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" id="tablaMovimientos">
                <thead class="thead-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Cliente</th>
                        <th>Bodega</th>
                        <th>Cantidad</th>
                        <th>Usuario</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movimientos as $mov)
                        <tr>
                            <td>{{ $mov->fecha }}</td>
                            <td>
                                <span class="badge {{ $mov->tipo == 'entrada' ? 'badge-success' : 'badge-danger' }}">
                                    {{ ucfirst($mov->tipo) }}
                                </span>
                            </td>
                            <td>{{ $mov->producto->nombre }}</td>
                            <td>{{ $mov->cliente->nombre }}</td>
                            <td>{{ $mov->bodega->nombre }}</td>
                            <td>{{ $mov->cantidad }}</td>
                            <td>{{ $mov->usuario->name ?? 'N/A' }}</td>
                            <td>{{ $mov->observaciones }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection