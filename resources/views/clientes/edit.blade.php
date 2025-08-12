@extends('layouts.app')
@section('title', 'Clientes')
@section('breadcrumb-parent', 'Editar')

@section('content')
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <h2 class="mb-0">Editar cliente</h2>
        </div>
        <div class="card-body">
          <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('clientes._form')
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection