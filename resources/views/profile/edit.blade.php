@vite(['resources/css/app.css','resources/js/app.js'])
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                 
                                               
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                                
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                                
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>              
        </div>                
    </div>                
@endsection