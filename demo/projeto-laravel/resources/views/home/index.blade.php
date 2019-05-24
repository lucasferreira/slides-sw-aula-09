@extends('layouts.default')
@section('title', 'Hello World')

@section('content')
<h2>Hello World!</h2>

<ul>
  <?php foreach ($alunos as $aluno) { ?>
  <li>
    <p>Cod: <?php echo $aluno->codigo ?></p>
    <p>Nome: <?php echo $aluno->nome ?></p>
    <p>Email: <?php echo $aluno->email ?></p>
    <a href="excluir/<?php echo $aluno->id ?>">Deletar</a>
  </li>
  <?php } ?>
</ul>

<form action="teste" method="post">
  {{ csrf_field() }}
  <input type="text" name="nome" placeholder="Insira o seu nome" /><br />
  <input type="submit" value="Enviar">
</form>
@endsection
