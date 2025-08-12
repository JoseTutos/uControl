@extends('layouts.app')
@section('title', 'Entradas')
@section('breadcrumb-parent', 'Crear')

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const existenciaSelect = document.getElementById('existencia_id');
    const stockInput = document.getElementById('stock_actual');
    const espacioInput = document.getElementById('espacio_ocupado_actual');

    existenciaSelect.addEventListener('change', function () {
        const existenciaId = this.value;

        stockInput.value = 'Cargando...';
        espacioInput.value = 'Cargando...';

        if (existenciaId) {
            fetch(`/existencias/stock/${existenciaId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Respuesta no válida');
                    }
                    return response.json();
                })
                .then(data => {
                    stockInput.value = data.cantidad_actual ?? '0';
                    espacioInput.value = data.espacio_ocupado ?? '0';
                })
                .catch(error => {
                    console.error('Error al obtener datos de existencia:', error);
                    stockInput.value = 'Error';
                    espacioInput.value = 'Error';
                });
        } else {
            stockInput.value = '';
            espacioInput.value = '';
        }
    });
});
</script>
@endpush

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 order-xl-1 mx-auto">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <h3 class="mb-0">Registrar Entrada</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('entradas.store') }}">
                        @csrf

                        {{-- Selección de Existencia --}}
                        <div class="form-group">
                            <label for="existencia_id" class="form-control-label">Existencia</label>
                            <select name="existencia_id" id="existencia_id" class="form-control" required>
                                <option value="">Seleccione una existencia</option>
                                @foreach ($existencias as $existencia)
                                    @if ($existencia->producto && $existencia->cliente && $existencia->bodega)
                                        <option
                                            value="{{ $existencia->id }}"
                                            {{ old('existencia_id') == $existencia->id ? 'selected' : '' }}
                                        >
                                            Producto: {{ $existencia->producto->nombre }} |
                                            Cliente: {{ $existencia->cliente->nombre }} |
                                            Bodega: {{ $existencia->bodega->nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('existencia_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Mostrar stock actual --}}
                        <div class="form-group">
                            <label class="form-control-label">Stock actual</label>
                            <input type="text" id="stock_actual" class="form-control" value="" disabled>
                        </div>

                        {{-- Mostrar espacio ocupado actual --}}
                        <div class="form-group">
                            <label class="form-control-label">Espacio ocupado actual (m²)</label>
                            <input type="text" id="espacio_ocupado_actual" class="form-control" value="" disabled>
                        </div>

                        {{-- Espacio a agregar --}}
                        <div class="form-group">
                            <label for="nuevo_espacio_ocupado" class="form-control-label">Espacio actualizado (m²)</label>
                            <input type="number" name="nuevo_espacio_ocupado" id="nuevo_espacio_ocupado" class="form-control" step="0.01" min="0" value="{{ old('nuevo_espacio_ocupado') }}" required>
                            @error('nuevo_espacio_ocupado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Cantidad --}}
                        <div class="form-group">
                            <label for="cantidad" class="form-control-label">Cantidad a ingresar</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="{{ old('cantidad') }}" required>
                            @error('cantidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Fecha --}}
                        <div class="form-group">
                            <label for="fecha_entrada" class="form-control-label">Fecha</label>
                            <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" value="{{ old('fecha_entrada', date('Y-m-d')) }}" required>
                            @error('fecha_entrada')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="form-group">
                            <label for="observaciones" class="form-control-label">Observaciones</label>
                            <textarea name="observaciones" id="observaciones" class="form-control">{{ old('observaciones') }}</textarea>
                        </div>

                        {{-- Botones --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Registrar Entrada</button>
                            <a href="{{ route('entradas.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection