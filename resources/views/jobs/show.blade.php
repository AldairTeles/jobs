@extends('layout')
@section('content')
<h1>Ver Mais</h1>

<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" disabled value="{{$job->title}}">
</div>
<div class="mb-3">
    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="4" rows="4" disabled
        class="form-control">{{$job->description}}</textarea>
</div>



<h1>Candidatos</h1>

<table class="table">
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>email</th>
    </thead>

    <tbody>
        @foreach ($users as $user)


        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>

    </tbody>
    @endforeach
</table>
<div class="mb-3">
    <a href="{{route('jobs.index')}}" class="btn btn-primary">Voltar</a>

</div>

@endsection