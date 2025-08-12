@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4">Detalle de la Categoría</h2>

    <div class="card shadow">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $categoria->id }}</p>
            <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Categoría
                </a>
            </div>
        </div>
    </div>
</div>
@endsection