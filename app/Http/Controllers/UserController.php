<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /*
	 Retorna todos os úsuarios
	 eu havia feito o filter direto no index,
	 foi criado um méto especifico para filtrar users;
	 */
    public function index(Request $request)
    {
        $users = $this->model
            ->getUsers(
                search: $request->search ?? ''
            );

        return view('users.index', compact('users'));
    }

    /*
	Retorna o cliente pelo id
	*/
    public function show($id)
    {
        //$user = $this->model->where('id', $id)->first();
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    /*Criando formulário úsuario*/

    public function create()
    {
        return view('users.create');
    }

    /*Cadastrando úsuario*/

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        //$extension = $request->image->getClientOriginalExtension(); //pegando a extensão do arquivo de upload
        if($request->image){
            $data['image'] = $request->image->store('users'); //1 exemplo
           //$data['image'] = $request->image->storeAs('users', now() . ".{$extension}");
        }

        $this->model->create($data);

        return redirect()->route('users.index');

        /*para inserir dados selecionados*/
        //$request->only(['name', 'email', 'password']); opcao 1
        /*$user = new User; opcao 2
		$user->name = $request->get('name');
		$user->name = $request->name;
		$user->save();*/
    }

    public function edit($id)
    {
        //Buscando o usuario pelo id
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update($id, StoreUpdateUserFormRequest $request)
    {
        //Buscando usuario pelo id
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $data =  $request->only('name', 'email');

        if ($request->password)
            $data['password'] = bcrypt($request->password);
            //dd(Storage::exists($request->image));
        if($request->image){

            if ($user->image && Storage::exists($user->image)) { //verifico se existe o upload do usuario
                Storage::delete($user->image);  //se sim, deleto o arquivo existente
            }
            $data['image'] = $request->image->store('users'); //1 exemplo
        }

        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $user->destroy($id);

        return view('users.show', compact('user'));
    }
}
