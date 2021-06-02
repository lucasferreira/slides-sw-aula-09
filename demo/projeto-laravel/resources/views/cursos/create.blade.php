@extends('layouts.default')

@section('content')
<h2>Adicionando Curso</h2>

<form action="{{ url("/cursos/create") }}" method="post">
  {{ csrf_field() }}
  <div class="mb-3">
    <label for="nomeCurso" class="form-label">Nome do Curso</label>
    <input type="text" name="name" class="form-control" id="nomeCurso">
  </div>
  <button class="btn btn-success">Cadastrar Curso</button>
</form>
@endsection
