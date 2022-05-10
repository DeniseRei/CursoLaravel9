@extends('layouts.app')
<!--CRIAR COMENTÁRIO -->
@section('title', "Novo Comentário para o usuário {{ $user->name }}")

@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">Novo Comentário para {{ $user->name }}</h1>

    @include('includes.validations-form')

    <form action="{{ route('comments.store', $user->id) }}" method="post">
        @include('users.comments._partials.form')
    </form>
@endsection
