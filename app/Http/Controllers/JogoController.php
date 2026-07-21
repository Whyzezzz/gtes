<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Jogo;

class JogoController extends Controller
{
    private $rawgApiKey = 'f11c55dd41f54105a657c61accca62e6';

    public function adicionarJogos()
    {
        $response = Http::get("https://api.rawg.io/api/games?key={$this->rawgApiKey}");

        if ($response->successful()) {
            $jogos = $response->json()['results'];

            foreach ($jogos as $jogo) {
                $storeUrl = isset($jogo['stores'][0]['url']) ? $jogo['stores'][0]['url'] : null;

                // Verificar se o jogo já existe pelo nome
                $existingJogo = Jogo::where('nome', $jogo['name'])->first();

                // Obter a imagem do jogo (verifique a estrutura da resposta da API RAWG)
                $backgroundImage = isset($jogo['background_image']) ? $jogo['background_image'] : null;

                if ($existingJogo) {
                    // Se existir, atualizar atributos, incluindo a imagem
                    $existingJogo->update([
                        'atributos' => json_encode($jogo),
                        'path_to_download' => $storeUrl,
                        'background_image' => $backgroundImage,
                    ]);
                } else {
                    // Se não existir, criar novo registro, incluindo a imagem
                    Jogo::create([
                        'nome' => $jogo['name'],
                        'preco' => 5.00, // Defina o preço conforme necessário
                        'atributos' => json_encode($jogo),
                        'path_to_download' => $storeUrl,
                        'background_image' => $backgroundImage,
                    ]);
                }
            }

            return response()->json(['message' => 'Jogos adicionados/atualizados com sucesso']);
        } else {
            return response()->json(['error' => 'Falha ao obter jogos da API RAWG'], $response->status());
        }
    }
    public function visualizarDetalhesDoJogo($nomeDoJogo)
    {
        // Buscar o jogo no banco de dados pelo nome
        $jogo = Jogo::where('nome', $nomeDoJogo)->first();

        if ($jogo) {
            // Decodificar os atributos do jogo
            $atributos = json_decode($jogo->atributos, true);

            // Retornar a visualização com os detalhes do jogo
            return view('jogos.atributos', compact('jogo', 'atributos'));
        } else {
            // Se o jogo não for encontrado, redirecionar ou exibir uma mensagem de erro
            return redirect()->back()->with('error', 'Jogo não encontrado');
        }
    }


    public function visualizarJogos()
{
    $jogos = Jogo::all();

    return view('jogos.catalogo', compact('jogos'));
}

    public function suggestions(Request $request)
    {
        $searchTerm = $request->input('search');
        $suggestions = Jogo::where('nome', 'like', '%'.$searchTerm.'%')->pluck('nome')->toArray();
        
        return response()->json($suggestions);
    }

}
