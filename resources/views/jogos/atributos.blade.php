@extends('layouts.app')

@section('title', $jogo->nome)

@section('content')
    <br><br><br><br>
    <!-- Conteúdo específico da página -->
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 order-lg-2">
                <img src="{{ $jogo->background_image }}" alt="{{ $jogo->nome }}" class="game-image img-fluid">
            </div>
            
            <div class="col-lg-6 order-lg-1">
                <h1 style="color: palevioletred;">{{ $jogo->nome }}</h1>
                <p style="color: palevioletred;">Data de Lançamento: <span style="color: gray;">{{ $atributos['released'] }}</span></p>
                <p style="color:palevioletred;">Ratings:</p>
                <ul style="color: gray;">
                    @foreach ($atributos['ratings'] as $rating)
                        <li><span style="color: gray;">{{ $rating['title'] }}:</span> {{ $rating['percent'] }}%</li>
                    @endforeach
                </ul>
                <p style="color: palevioletred;">Plataformas:</p>
                <ul style="color: palevioletred;">
                    @foreach ($atributos['platforms'] as $platform)
                        <li><span style="color: gray;">{{ $platform['platform']['name'] }}</span></li>
                    @endforeach
                </ul>
            </div>
            
        </div>
        
        <!-- Adicionar screenshots -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 style="color: palevioletred;">Screenshots</h2>
                <div class="row">
                    @foreach ($atributos['short_screenshots'] as $index => $screenshot)
                        @if ($index > 0) <!-- Verifica se o índice é maior que 0 para ignorar a primeira imagem -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <img src="{{ $screenshot['image'] }}" class="img-fluid" alt="Screenshot">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
@endsection
