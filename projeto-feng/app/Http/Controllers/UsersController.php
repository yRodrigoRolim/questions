<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);

        return view('users', ['usersreturn' => $users]);
    }

    public function create()
    {
        $users = User::all();

       return view('users', ['usersreturn' => $users]);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
        ]);

        $userName = strtolower($request->name);
        // Criação do novo usuário
        User::create([
            'name' => $userName,
            'acertos' => 0,
            'erros' => 0,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');

    }

    public function show($id)
    {
        // Mostrar usuário específico
        $users = User::findOrFail($id);
        return view('usersreturn', ['usersreturn' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Obtém um único usuário

        return view('useredit', ['user' => $user]); // Nome da variável 'user' ao invés de 'usersreturn'
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'useredit' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id); // Obtém o usuário a ser editado

        if ($user) {
            $user->name = $request->useredit; // Atualiza o nome
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!'); // Alerta de sucesso
        } else {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado!'); // Alerta de erro
        }
    }

    public function destroy($id)
    {
        // Excluir o usuário
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
