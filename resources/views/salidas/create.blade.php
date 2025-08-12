@extends('layouts.app')
@section('title', 'Salidas')
@section('breadcrumb-parent', 'Crear')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Registrar Salida</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salidas.store') }}" method="POST">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="form-group">
                    <label for="existencia_id">Existencia</label>
                    <select class="form-control" name="existencia_id" id="existencia_id" required>
                        <option value="">Seleccione una existencia</option>
                        @foreach($existencias as $existencia)
                            <option value="{{ $existencia->id }}">
                                Producto: {{ $existencia->producto->nombre }} |
                                Cliente: {{ $existencia->cliente->nombre }} |
                                Bodega: {{ $existencia->bodega->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock_actual">Stock actual</label>
                    <input type="number" class="form-control" id="stock_actual" readonly>
                </div>

                <div class="form-group">
                    <label for="espacio_ocupado_actual">Espacio ocupado actual (m²)</label>
                    <input type="number" class="form-control" id="espacio_ocupado_actual" readonly>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad a retirar</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" required min="1">
                </div>

                <div class="form-group">
                    <label for="nuevo_espacio_ocupado">Nuevo espacio ocupado (m²)</label>
                    <input type="number" step="0.01" class="form-control" name="nuevo_espacio_ocupado" required>
                </div>

               <div class="form-group">
                    <label for="fecha_salida">Fecha de salida</label>
                    <input type="date" name="fecha_salida" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" name="observaciones" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Registrar salida</button>

            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('existencia_id').addEventListener('change', function() {
        const existenciaId = this.value;

        if (existenciaId) {
            fetch(`/existencias/stock/${existenciaId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('stock_actual').value = data.cantidad_actual ?? 0;
                    document.getElementById('espacio_ocupado_actual').value = data.espacio_ocupado ?? 0;
                });
        } else {
            document.getElementById('stock_actual').value = '';
            document.getElementById('espacio_ocupado_actual').value = '';
        }
    });

    document.getElementById('cantidad').addEventListener('input', function() {
        const cantidad = parseInt(this.value) || 0;
        const stock = parseInt(document.getElementById('stock_actual').value) || 0;

        if (cantidad > stock) {
            alert('No puedes retirar más del stock actual');
            this.value = '';
        }
    });
</script>
@endsection