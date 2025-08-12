@extends('layouts.app')
@section('title', 'Categorias')
@section('breadcrumb-parent', 'Ver todas')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4">Categorías</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categorias.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Nueva Categoría
    </a>

    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 text-center">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                            <th class="text-secondary opacity-7">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $categoria)
                        <tr>
                            <td class="text-sm font-weight-bold">{{ $categoria->id }}</td>
                            <td class="text-sm font-weight-bold">{{ $categoria->nombre }}</td>
                            <td class="text-sm text-secondary">{{ $categoria->descripcion }}</td>
                            <td>
                                <a href="{{ route('categorias.show', $categoria->id) }}" class="text-info font-weight-bold text-xs me-2" title="Ver">
                                    Ver
                                </a>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="text-warning font-weight-bold text-xs me-2" title="Editar">
                                    Editar
                                </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger text-xs p-0 m-0" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')" title="Eliminar">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-sm">No hay categorías registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection