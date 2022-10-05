@extends('layout')
@section('content')
<h1>Editar Vagas</h1>

<form action="{{ route('jobs.update', [$jobs])}}" method="post" class="mt-5">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$jobs->title}}">
    </div>
    <div class="mb-3">
        <label for="description">Descrição</label>
        <textarea name="description" id="description" cols="4" rows="4" class="form-control">{{$jobs->description}}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>

    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>


@endsection