@extends('layouts.app')
@section('title', 'Bodegas')
@section('breadcrumb-parent', 'Crear')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="card">
        <div class="card-header pb-0">
          <h4 class="mb-0">Crear Nueva Bodega</h4>
        </div>

        <div class="card-body">
          {{-- Validaciones --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('bodegas.store') }}" method="POST">
            @csrf

            {{-- Formulario reusado --}}
            @include('bodegas.form')

            <div class="mt-4 d-flex justify-content-between">
              <a href="{{ route('bodegas.index') }}" class="btn btn-outline-secondary">
                ← Volver
              </a>
              <button type="submit" class="btn btn-primary">
                Guardar Bodega
              </button>
            </div>
          </form>
        </div>
      </div>

@endsection