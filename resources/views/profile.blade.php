@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-profile">
                <img src="{{ asset('argon/assets/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                            <a href="#">
                                <img src="{{ asset('argon/assets/img/avatar.png') }}" class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5 class="h3">
                            {{ Auth::user()->nombre ?? 'Nombre de Usuario' }}
                        </h5>
                        <div class="h5 font-weight-300">
                            {{ Auth::user()->email ?? 'correo@ejemplo.com' }}
                        </div>
                        <div class="mt-4">
                            <a href="#" class="btn btn-sm btn-primary">Editar Perfil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection