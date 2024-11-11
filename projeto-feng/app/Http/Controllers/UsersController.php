<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

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
        // Mostrar o formulário de edição do usuário
        $users = User::findOrFail($id);
        return view('users', ['usersreturn' => $users]);
    }

    public function update(Request $request, $id)
    {
        // Validação do campo 'name' (único para esse usuário)
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
        ]);

        // Atualizar o usuário
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
        ]);

        return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Excluir o usuário
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
