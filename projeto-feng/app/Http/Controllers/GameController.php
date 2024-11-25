<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class GameController extends Controller
{
    // Exibe o jogo
    public function play()
    {
        // Seleciona uma pergunta e um usuário aleatórios
        $question = Question::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        // Verifica se existem perguntas e usuários no banco
        if (!$question || !$user) {
            return back()->with('error', 'Certifique-se de que há perguntas e usuários disponíveis.');
        }

        // Retorna a visão com a pergunta e o usuário
        return view('game', compact('question', 'user'));
    }

    // Processa o resultado (acertou ou errou)
    public function processResult(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'user_id' => 'required|exists:users,id',
            'result' => 'required|in:acerto,erro',
        ]);
    
        // Recupera os modelos de pergunta e usuário
        $question = Question::findOrFail($request->question_id);
        $user = User::findOrFail($request->user_id);
    
        // Salva a resposta na tabela auxiliar
        \App\Models\QuestionResponse::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
            'answered_at' => now(),
        ]);
    
        // Atualiza os contadores com base no resultado
        if ($request->result === 'acerto') {
            $question->increment('acertos');
            $user->increment('acertos');
        } elseif ($request->result === 'erro') {
            $question->increment('erros');
            $user->increment('erros');
        }
    
        // Redireciona para jogar novamente com mensagem de sucesso
        return redirect()->route('game')->with('success', 'Resultado registrado com sucesso!');
    }
    
}
