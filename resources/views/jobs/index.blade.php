@extends('layout')
@section('content')
<h1>Vagas</h1>

<div class="d-flex justify-content-end my-4">
    <a href="{{route('jobs.create')}}" class='btn btn-primary'>Cadastrar Vagas</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Descrição</th>
            <th>Empresa</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{$job->title}}</td>
            <td>{{$job->description}}</td>
            <td>{{$job->company->name }}</td>
            <td>
                
                <a href="{{route('jobs.edit',[$job])}}" class="btn btn-info">Editar</a>
                <a href="{{route('jobs.show',[$job])}}" class="btn btn-info">Ver Mais</a>


                <form action="{{route('jobs.destroy',[$job])}}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                    <button tipe="submit" class="btn btn-danger">excluir</button>
                </form>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>
@endsection