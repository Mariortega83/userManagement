@extends('layouts.app') <!-- Extiende el layout principal -->

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Mi Información</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nombre:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        @if($user->role === 'superAdmin')
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Correo Electrónico:</label>
                            <input type="email" class="form-control " id="email" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        @else
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Correo Electrónico:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required onblur="resetEmailField()">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @endif


                        <!-- Nueva Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Nueva Contraseña (opcional):</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg " style="max-width: 200px; margin: 0 auto;">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function resetEmailField() {
        var emailField = document.getElementById('email');
        if (emailField.value.trim() === '') {
            emailField.value = '{{ $user->email }}'; // Vuelve a poner el correo original
        }
    }
</script>

@endsection