@extends('layout')

@section('content')
<h1>empresas</h1>

<div class="d-flex justify-content-end my-4">
<a href="{{route('companies.create')}}"class='btn btn-primary'>Criar empresa</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Nome fantasia</th>
            <th>CNPJ</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->corporate_name}}</td>
            <td>{{$company->cnpj}}</td>
            <td>
                <a href="{{route('companies.edit',[$company])}}" class="btn btn-info">editar</a>
                

                <form action="{{route('companies.destroy',[$company])}}"
                class = "d-inline-block"
                method="post">
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