@extends('layout')
@section('content')
<h1>Cadastrar Vaga</h1>


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>

</div>

@endif

<form action="{{route('jobs.store')}}" method='post'>
    @csrf

    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="description">Descrição</label>

        <textarea name="description" id="description" cols="4" rows="4" class="form-control"></textarea>

    </div>

    <div class="mb-3">
        <label for="company">Empresa</label>
        <select name="company_id" id="company" class="form-select">
            @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>

    <button type="reset" class="btn btn-secondary">Limpar</button>


</form>

@endsection