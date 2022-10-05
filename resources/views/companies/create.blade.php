@extends('layout')

@section('content')
<h1>Criar empresa</h1>

@if ($errors->any())
<div class="alert alert-danger my-3">
    <ul style="list-style: none">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('companies.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="corporate_name">Corporate name</label>
        <input type="text" name="corporate_name" id="corporate_name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" class="form-control">
    </div>


    <button type="submit" class="btn btn-success">Salvar</button>

    <button type="reset" class="btn btn-secondary">Limpar</button>

</form>

@endsection