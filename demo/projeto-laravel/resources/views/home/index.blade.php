@extends('layouts.default')
@section('title', 'Hello World')

@section('content')
<h2>Hello World!</h2>

<ul>
  <?php foreach ($alunos as $aluno) { ?>
  <li><?php echo $aluno->nome ?></li>
  <?php } ?>
</ul>
@endsection
