@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Carrinho de Compras</h1>
                    <form action="{{ route('carrinho.remover') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if($carrinhoItens->isEmpty())
                            <p>O seu carrinho está vazio.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th> <!-- Cabeçalho para a checkbox -->
                                        <th>Imagem</th>
                                        <th>Nome do Jogo</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Ações</th>
                                    </tr>
                                    <style>
                                        th{
                                            color:palevioletred;
                                        }
                                        td{
                                            color:white;
                                        }
                                        
                                    </style>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($carrinhoItens as $item)
                                        @php
                                            $subtotal = $item->jogo->preco * $item->quantidade;
                                            $total += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="itens_selecionados[]" value="{{ $item->id_jogo }}">
                                            </td>
                                            <td class="game-image-cell">
                                                <img src="{{ asset($item->jogo->background_image) }}" alt="{{ $item->jogo->nome }}">
                                            </td>
                                            <style>
                                                .game-image-cell img {
                                                    width: 100px; /* Defina o tamanho desejado para a largura da imagem */
                                                    height: auto; /* Isso manterá a proporção da imagem */
                                                }
                                            </style>
                                            <td>{{ $item->jogo->nome }}</td>
                                            <td>{{ $item->quantidade }}</td>
                                            <td>R${{ number_format($item->jogo->preco, 2, ',', '.') }}</td>
                                            <td>
                                                <!-- Não é mais necessário um formulário aqui -->
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Total:</th>
                                            <th colspan="2">R${{ number_format($total, 2, ',', '.') }}</th>
                                        </tr>
                                    </thead>
                                </tfoot>
                            </table>
                            <button type="submit" class="btn btn-danger">Remover</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
