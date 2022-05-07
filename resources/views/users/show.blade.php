@extends('layouts.app')
<<<<<<< HEAD
<!--LISTAGEM DO USUARIO -->
@section('title', 'Dados sobre o Usuário')
=======
>>>>>>> aula20

@section('title', 'Listagem do Usuário')

<<<<<<< HEAD
    <h1>Dados sobre o Usuário - {{ $user->name }}</h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>

    </ul>
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @method('DELETE')
        @csrf
        <Button type="submit">Excluir</Button>

    </form>
=======
@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Listagem do usuário {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
</ul>

<form action="{{ route('users.destroy', $user->id) }}" method="POST" class="py-12">
    @method('DELETE')
    @csrf
    <button type="submit" class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
</form>

>>>>>>> aula20
@endsection
