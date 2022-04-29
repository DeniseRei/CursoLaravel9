@extends('layouts.app')
<!--LISTAGEM DO USUARIO -->
@section('title', 'Dados sobre o Usuário' )

@section('content')

<h1>Dados sobre o Usuário - {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{$user->email}}</li>

</ul>
@endsection
