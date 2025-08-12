@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <h2 class="mb-0">Detalles del cliente</h2>
        </div>
        <div class="card-body">
          <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
          <p><strong>NIT:</strong> {{ $cliente->nit }}</p>
          <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
          <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
          <p><strong>Email:</strong> {{ $cliente->email }}</p>
          <p><strong>Nombre de contacto:</strong> {{ $cliente->nombre_contacto }}</p>
          <p><strong>Estado:</strong> {{ ucfirst($cliente->estado) }}</p>

          <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
          <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection