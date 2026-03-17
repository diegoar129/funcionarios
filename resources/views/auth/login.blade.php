@extends('plantilla')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ $title ?? 'Iniciar sesión' }}</h2>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ $submitRoute ?? route('login.funcionario.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="text-center mt-3">
                @if(($loginType ?? 'funcionario') === 'admin')
                    <a href="{{ route('login.funcionario') }}">Ir a inicio de sesión de funcionario</a>
                @else
                    <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
                    <div class="mt-2">
                        <a href="{{ route('login.admin') }}">¿Eres administrador? Entra aquí</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
