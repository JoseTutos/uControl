@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumb-parent', 'Crear')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="card">
        <div class="card-header pb-0">
          <h4 class="mb-0">Registrar Producto</h4>
        </div>
        <div class="card-body">

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="codigo_producto" class="form-label">Código del Producto</label>
                <input type="text" name="codigo_producto" class="form-control" value="{{ old('codigo_producto') }}" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                <input type="text" name="unidad_medida" class="form-control" value="{{ old('unidad_medida') }}" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="valor_unitario" class="form-label">Valor Unitario</label>
                <input type="number" step="0.01" name="valor_unitario" class="form-control" value="{{ old('valor_unitario') }}" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="iva" class="form-label">IVA (%)</label>
                <input type="number" step="0.01" name="iva" class="form-control" value="{{ old('iva') }}">
              </div>

              <div class="col-md-12 mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones') }}</textarea>
              </div>

              <div class="col-md-6 mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select" required>
                  <option value="">Seleccione una categoría</option>
                  @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                      {{ $categoria->nombre }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="capacidad" class="form-label">Capacidad (m²)</label>
                <input type="number" step="0.01" min="0" name="capacidad" class="form-control" value="{{ old('capacidad') }}" required>
              </div>

            </div>

            <div class="mt-4 text-end">
              <button type="submit" class="btn btn-primary">Guardar Producto</button>
              <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver</a>
            </div>
          </form>

                @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection