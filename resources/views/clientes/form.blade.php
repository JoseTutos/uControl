@php 
    $cliente = $cliente ?? null;
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nombre" class="form-control-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="nit" class="form-control-label">NIT</label>
            <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit', $cliente->nit ?? '') }}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="direccion" class="form-control-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion ?? '') }}" required>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="telefono" class="form-control-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono ?? '') }}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="form-control-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="nombre_contacto" class="form-control-label">Nombre de contacto</label>
            <input type="text" name="nombre_contacto" id="nombre_contacto" class="form-control" value="{{ old('nombre_contacto', $cliente->nombre_contacto ?? '') }}" required>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="estado" class="form-control-label">Estado</label>
    <select name="estado" id="estado" class="form-control" required>
        <option value="activo" {{ old('estado', $cliente->estado ?? '') == 'activo' ? 'selected' : '' }}>Activo</option>
        <option value="inactivo" {{ old('estado', $cliente->estado ?? '') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>