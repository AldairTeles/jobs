@extends('layout')
@section('content')
<h1>Criar Usuário</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>

</div>
@endif

<form action="{{route('users.store')}}" method='post'>
    @csrf

    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email">email</label>
        <input type="email" name="email" id="email" class="form-control">

    </div>

    <div class="mb-3">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password_confirmation">Confirme sua senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>

    <button type="reset" class="btn btn-secondary">Limpar</button>


</form>


@endsection