@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    /* Personalizar o layout*/
    body {
        background-color: #212529; 
        color: #ffffff; 
    }

    .auth-page {
        display: flex;
        justify-content: space-between;
        padding: 20px; 
    }

    .auth-form {
        width: 48%;
        padding: 20px; 
        border-radius: 10px; 
    }

    /* Estilos para os campos de formulário */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: palevioletred; 
    }

    .form-group input {
        width: 100%;
        padding: 5px;
        background-color: transparent; 
        border: none;
        border-bottom: 1px solid white; 
        color: white; 
        outline: none; 
    }

    /* Estilos para os botões de autenticação */
    .auth-form button {
        background-color: palevioletred;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .auth-form button:hover {
        background-color: white;
        color: palevioletred;
    }

    /* Estilos para as seções adicionadas */
    .forgot-password {
        margin-top: 10px;
        color: #fff;
        text-decoration: underline;
    }

    .signup-link {
        margin-top: 10px;
        color: palevioletred;
    }
</style>    

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="auth-page">
                        <div class="auth-form">
                            <!-- Session Status -->
                            <div class="mb-4">
                                <!-- Aqui você pode exibir mensagens de status de sessão, se necessário -->
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-success">Login</button>

                                <p class="forgot-password">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                    @endif
                                </p>
                                <p class="signup-link">Don't have an account? <a href="{{ route('register') }}">Signup</a></p>
                            </form>
                        </div>
                        <div class="auth-form">
                            <div class="main-banner">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="header-text">
                                            <b><h4>Welcome To <em>Cyborg</em></h4></b>
                                            <div class="main-button">
                                                <a href="browse.html">Browse Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
