@php
    $bodega = $bodega ?? null;
@endphp

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="nombre" class="form-control-label">Nombre</label>
      <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $bodega->nombre ?? '') }}" required>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="ubicacion" class="form-control-label">Ubicación</label>
      <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ old('ubicacion', $bodega->ubicacion ?? '') }}" required>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-6">
    <div class="form-group">
      <label for="capacidad" class="form-control-label">Capacidad (m²)</label>
      <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad', $bodega->capacidad ?? '') }}" required>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="estado" class="form-control-label">Estado</label>
      <select name="estado" id="estado" class="form-control" required>
        <option value="Activo" {{ old('estado', $bodega->estado ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('estado', $bodega->estado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
      </select>
    </div>
  </div>
</div>