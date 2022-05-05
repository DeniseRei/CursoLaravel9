@extends('layouts.app')
<!--EDITAR USUARIO -->
@section('title', "Editar Usuário {{ $user->name }}" )

@section('content')

<h1>Editar Usuário {{ $user->name }} </h1>

@include('includes.validations-form')

<form action="{{ route('users.update', $user->id) }}" method="post">
    <!--<input type="text" name= "_method" class="hidden" value="PUT">-->
    @method('PUT')
    @include('users._partials.form')
</form>
@endsection
