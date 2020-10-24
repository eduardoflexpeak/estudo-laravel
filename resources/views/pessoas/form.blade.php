@extends('template.base')

@section('titulo', 'Formulário de Pessoa')

@section('conteudo')
    <h1>Formulário de Pessoa</h1>

    @if (isset($pessoa))
        <form action="/pessoas/{{ $pessoa->id }}" method="post">
            @method('PUT')
    @else
        <form action="/pessoas" method="post">
    @endif
        @csrf
        <input class="form-control" type="text" name="nome" placeholder="Nome" value="{{ $pessoa->nome ?? '' }}">
        @error('nome')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <input class="form-control" type="text" name="telefone" placeholder="Telefone" value="{{ $pessoa->telefone ?? '' }}">
        <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $pessoa->email ?? '' }}">
        <input class="form-control" type="text" name="cpf" placeholder="CPF" value="{{ $pessoa->cpf ?? '' }}">
        @error('cpf')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <input class="btn btn-primary" type="submit" value="Salvar">
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="/pessoas">Voltar</a>
@endsection
