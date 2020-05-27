@extends('layouts.default')

@section('content')
<p>Bem-vindo</p>

<ul>
  @foreach($alunos as $aluno)
  <li>{{ $aluno->codigo }} - {{ $aluno->nome }}</li>
  @endforeach
</ul>
@endsection
