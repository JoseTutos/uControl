@extends('layouts.app')
@section('title', 'Productos')
@section('breadcrumb-parent', 'Editar')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header pb-0">
          <h5>Editar Bodega</h5>
        </div>
        <div class="card-body px-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('bodegas.update', $bodega->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('bodegas.form')

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">Cancelar</a>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection