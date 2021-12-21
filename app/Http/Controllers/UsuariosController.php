<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Lista todos os usuários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Exibe o formulário para criação de usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.form');
    }

    /**
     * Armazena um novo usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'cpf' => $request->input('cpf'),
        ]);

        return redirect('/usuarios/'.$usuario->id);
    }

    /**
     * Exibe um usuário.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('usuarios.show', ['usuario' => $usuario]);
    }

    /**
     * Exibe o formulário para editar um usuário.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    /**
     * Atualiza um usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'cpf' => $request->input('cpf'),
        ]);

        return redirect('/usuarios/' . $usuario->id);
    }

    /**
     * Deleta um usuátio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        return $usuario->delete();
    }
}
