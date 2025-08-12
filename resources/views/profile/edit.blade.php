@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Editar Perfil</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label" for="name">Nombre</label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Correo Electrónico</label>
                        <input class="form-control @error('email') is-invalid @enderror"
                               type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Eliminar Cuenta
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal de eliminación de cuenta --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Cuenta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.</p>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirma tu contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection