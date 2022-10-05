@extends('layout')
@section('content')
<h1>Usuários</h1>

<div>
    <a href="{{route('users.create')}}" class='btn btn-primary'>Criar Usuário</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>email</th>
            <th>Ações</th>
        </tr>
    </thead>


    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('users.edit',[$user])}}" class="btn btn-info">editar</a>


                <form action="{{route('users.destroy',[$user])}}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button tipe="submit" class="btn btn-danger">excluir</button>
                </form>
            </td>
        </tr>


        @endforeach
    </tbody>



    @endsection