@extends('layouts.app')
<!--EDITAR USUARIO -->
@section('title', "Editar Usuário {{ $user->name }}" )

@section('content')

<h1>Editar Usuário {{ $user->name }} </h1>
<!-- Mensagem de erro padrão Laravel -->
@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user->id) }}" method="post">
    <!--<input type="text" name= "_method" class="hidden" value="PUT">-->
    @method('PUT')
    @csrf
    <input type="text" name="name" placeholder="Nome:" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="E-mail:" value="{{ $user->email}}">
    <input type="password" name="password" placeholder="Senha:">
    <button type="submit">Enviar</button>
</form>
@endsection
