@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    alhadulillah
                </div>

                <div class="card-body">
                        <a href="{{url('login') }}">Login</a>
                        <br>
                        <a href="{{ route('verificado') }}">Verificar</a>
                        <br>
                        <a href="{{ route('home') }}">Password forgot</a>
                        <br>
    
                </div>

                
            </div>
        </div>
    </div>
</div>

<!-- <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form class="login-form">
    <h3>Login Here</h3>

    <label for="username">Username</label>
    <input type="text" placeholder="Email" id="username">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password">

    <button>Log In</button>
    <div class="social">
        <div class="go"> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const originalPlaceholder = usernameInput.placeholder;
        const originalPasswordPlaceholder = passwordInput.placeholder;

        // Borra el placeholder al hacer clic en el input
        usernameInput.addEventListener('focus', () => {
            usernameInput.placeholder = ''; // Borra el placeholder
        });

        // Restaura el placeholder si el usuario no escribe nada
        usernameInput.addEventListener('blur', () => {
            if (!usernameInput.value) {
                usernameInput.placeholder = originalPlaceholder; // Restaura el placeholder
            }
        });

        // Borra el placeholder al hacer clic en el input
        passwordInput.addEventListener('focus', () => {
            passwordInput.placeholder = ''; // Borra el placeholder
        });

        // Restaura el placeholder si el usuario no escribe nada

        passwordInput.addEventListener('blur', () => {
            if (!passwordInput.value) {
                passwordInput.placeholder = originalPasswordPlaceholder; // Restaura el placeholder
            }
        });
    });
</script> -->
@endsection