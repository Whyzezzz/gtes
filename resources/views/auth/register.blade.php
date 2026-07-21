@extends('layouts.app')

@section('title', 'Register')

@section('content')
    
@vite(['resources/js/app.js'])
    <style>
        /* Personalizar o Layout */
        body {
            background-color: #212529;
            color: #ffffff; 
        }
    
        .register-page {
            display: flex;
            justify-content: space-between;
            padding: 20px; 
        }
    
        .register-form {
            width: 48%;
            padding: 20px; 
            border-radius: 10px; 
        }
    
        /* Estilos para a main-banner */
        .main-banner {
            width: 48%;
            display: flex;
            align-items: center;
        }

        /* Estilos para a header-text */
        .header-text {
            width: 100%;
        }

        /* Estilos para o botão Browse Now */
        .main-button a {
            background-color: palevioletred;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 15px;
            text-decoration: none; 
            display: inline-block;
            margin-top: 10px; 
            transition: background-color 0.3s;
        }

        .main-button a:hover {
            background-color: white;
            color: palevioletred;
        }

        /* Estilos para o botão Register */
        .register-form button {
            background-color: palevioletred;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    
        .register-form button:hover {
            background-color: white;
            color: palevioletred;
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
    
        /* Estilos para os novos elementos */
        .terms-policy {
            margin-top: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
    
        .terms-checkbox {
            margin-right: 5px;
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
                    <div class="register-page">
                        <div class="register-form">
                            <h2>Register</h2>
                            <br>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                
                                <!-- Email Address -->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                </div>

                                <input type="checkbox" id="termsCheckbox" name="termsCheckbox" class="terms-checkbox" required>
                                <label for="termsCheckbox">I agree with the terms and policy</label>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-success">Register</button>
                                <br>
                                <br>
                                <p class="signup-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </form>
                        </div>
                        <div class="main-banner">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-text">
                                        <h4>Welcome To <em>Cyborg</em></h4>
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


@endsection