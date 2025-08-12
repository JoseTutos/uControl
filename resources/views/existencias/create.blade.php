@extends('layouts.app')
@section('title', 'Existencias')
@section('breadcrumb-parent', 'Crear')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header"><h6>Registrar existencia</h6></div>
        <div class="card-body">
          <form action="{{ route('existencias.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label>Producto</label>
              <select name="producto_id" class="form-control" required>
                @foreach ($productos as $p)
                  <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label>Cliente</label>
              <select name="cliente_id" class="form-control" required>
                @foreach ($clientes as $c)
                  <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label>Bodega</label>
              <select name="bodega_id" class="form-control" required>
                @foreach ($bodegas as $b)
                  <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label>Cantidad actual</label>
              <input type="number" name="cantidad_actual" class="form-control" min="0" required>
            </div>

              <div class="mb-3">
              <label>Espacio ocupado (m²)</label>
              <input type="number" name="espacio_ocupado" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
              <label>Stock mínimo</label>
              <input type="number" name="stock_minimo" class="form-control" min="0" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection