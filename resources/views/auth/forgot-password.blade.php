@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <section>
        <div class="container">
            <div class="col-md-7 mx-auto">
                <div class="page-content">
                    <div class="card-header"><b style="color: white">{{ __('Reset Password') }}</b></div>

                    <div class="card-body">
                        <p class="mb-4 text-sm text-white dark:text-gray-400">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                        
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" style="color: white"/>

                        <form method="POST" action="{{ route('password.email') }}" class="form-group">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" style="color: white">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="background-color:palevioletred; border-radius: 50px; border: white">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>x
        </div>
    </section>
@endsection
