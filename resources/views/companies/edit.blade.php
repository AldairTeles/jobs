@extends('layout')
@section('content')
<h1>Editar empresa</h1>

<form action="{{ route('companies.update', [$company])}}" method="post" class="mt-5">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
    </div>
    <div class="mb-3">
        <label for="corporate_name">Corporate name</label>
        <input type="text" name="corporate_name" id="corporate_name" class="form-control"
            value="{{$company->corporate_name}}">
    </div>
    <div class="mb-3">
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{$company->cnpj}}">
    </div>


    <button type="submit" class="btn btn-success">Salvar</button>

    <button type="reset" class="btn btn-secondary">Limpar</button>

</form>

@endsection