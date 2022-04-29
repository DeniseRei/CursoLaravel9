<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      /*
     Retorna todos os úsuarios
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
    /*
    Retorna o cliente pelo id
    */
    public function show($id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    /*Criando formulário úsuario*/

    public function create()
    {
        return view('users.create');
    }

    /*Cadastrando úsuario*/

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');

        /*para inserir dados selecionados*/
        //$request->only(['name', 'email', 'password']); opcao 1
        /*$user = new User; opcao 2
        $user->name = $request->get('name');
        $user->name = $request->name;
        $user->save();*/
    }
}
