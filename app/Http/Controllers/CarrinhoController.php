<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinhoItens = Carrinho::where('id', auth()->id())->get();

        return view('carrinho.index', compact('carrinhoItens'));
    }
    public function adicionarAoCarrinho(Request $request)
    {
        // Verifica se o usuário está autenticado
        if (!auth()->check()) {
            return response()->json(['message' => 'Você precisa estar logado para adicionar itens ao carrinho.'], 401);
        }

        $request->validate([
            'id_jogo' => 'required|exists:jogos,id_jogo',
            'quantidade' => 'required|integer|min:1',
        ]);

        $carrinho = Carrinho::create([
            'id' => auth()->id(),
            'id_jogo' => $request->input('id_jogo'),
            'quantidade' => 1
        ]);

        // Retornar uma resposta adequada, como JSON ou redirecionar para o carrinho
    }
    public function removerDoCarrinho(Request $request)
    {
        // Verifique se há itens selecionados para remover
        if (!$request->has('itens_selecionados')) {
            return redirect()->route('carrinho.index')->with('error', 'Nenhum item selecionado para remover.');
        }
    
        // Recupere os IDs dos itens selecionados
        $itensSelecionados = $request->input('itens_selecionados');
    
        // Remova os itens selecionados do carrinho
        Carrinho::where('id', auth()->id())->whereIn('id_jogo', $itensSelecionados)->delete();
    
        return redirect()->route('carrinho.index')->with('success', 'Itens selecionados removidos do carrinho com sucesso.');
    }
    

    
}

