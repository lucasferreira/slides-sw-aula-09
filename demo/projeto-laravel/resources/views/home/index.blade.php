@extends('layouts.default')

@section('content')
<h2 style="color: red;">ACORDA PEDRINHO</h2>

<ul>
  @foreach ($alunos as $aluno)
  <li>{{ $aluno->nome }} | <a href="{{ route("home.delete", $aluno->id)}}">Excluir</a></li>
  @endforeach
</ul>

<br />
<form action="{{ route("home.create") }}" method="post" style="border-top: 1px solid black; padding-top: 16px;">
  @csrf
  @method("POST")
  <fieldset>
    <div class="form-group @if ($errors->has('nome')) has-error @endif">
      <label for="nomeAluno">Adicionar novo Aluno:</label>
      <input type="text" id="nomeAluno" name="nome" class="form-control" value="{{ old("nome") }}" />
      @if ($errors->has('nome'))
      <span class="help-block" role="alert">
          <strong>{{ $errors->first('nome') }}</strong>
      </span>
      @endif
    </div>
    <br />
    <div class="form-group @if ($errors->has('email')) has-error @endif">
      <label for="emailAluno">E-mail:</label>
      <input type="text" id="emailAluno" name="email" class="form-control" value="{{ old("email") }}" />
      @if ($errors->has('email'))
      <span class="help-block" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <br />
    <button class="btn btn-primary btn-lg">Cadastrar Aluno</button>
  </fieldset>
</form>
@endsection
