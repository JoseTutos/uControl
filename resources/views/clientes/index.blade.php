@extends('layouts.app')
@section('title', 'Clientes')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6>Listado de Clientes</h6>
          <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary">Nuevo cliente</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIT</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                  <th class="text-secondary opacity-7">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $cliente)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1 justify-content-center">
                      <div>
                      
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $cliente->nombre }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $cliente->email }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $cliente->nit }}</p>
                  </td>
                  <td>
                    <p class="text-xs text-secondary mb-0">{{ $cliente->telefono }}</p>
                  </td>
                  <td class="align-middle text-sm">
                    <span class="badge badge-sm bg-gradient-{{ $cliente->estado == 'activo' ? 'success' : 'danger' }}">
                      {{ ucfirst($cliente->estado) }}
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('clientes.show', $cliente->id) }}" class="text-info font-weight-bold text-xs me-2">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-info font-weight-bold text-xs me-2">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link text-danger text-xs p-0 m-0" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection