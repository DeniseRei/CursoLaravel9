<h1>Listagem de Usuários</h1>


<ul>
    @foreach ($users as $user)
    <li>
        {{ $user->name }} ->
        {{ $user->email }}
    </li>
    @endforeach
</ul>
