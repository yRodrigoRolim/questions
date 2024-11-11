<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('questions', ['questionreturn' => $questions]);
    }

    public function create()
    {
        return view('questions');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        $question = strtolower($request->question);
        // Criação do novo usuário
        Question::create([
            'question' => $question,
            'acertos' => 0,
            'erros' => 0,
        ]);

        return redirect()->route('questions.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show($id)
    {
        // Mostrar usuário específico
        $questions = Question::findOrFail($id);
        return view('questionreturn', ['questionreturn' => $questions]);
    }

    public function edit($id)
    {

        $questions = Question::findOrFail($id);

        return view('questionedit', ['questionreturn' => $questions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'editquestion' => 'required|string|max:255',
        ]);
    
        $perguntaedit = Question::find($id); 
    
        if ($perguntaedit) {
            $perguntaedit->question = $request->editquestion;
            $perguntaedit->save();
    
            return redirect()->route('questions.index')->with('success', 'Pergunta atualizada com sucesso!');
        } else {
            return redirect()->route('questions.index')->with('error', 'Pergunta não encontrada!');
        }
    }
    

    public function destroy($id)
    {
        // Excluir o usuário
        $user = Question::findOrFail($id);
        $user->delete();

        return redirect()->route('questions.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
