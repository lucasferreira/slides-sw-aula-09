@extends('layouts.default')

@section('content')
<h2>Editando Curso</h2>

<form action="{{ url("/cursos/edit/{$curso->id}") }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id" value="{{ $curso->id }}">
  <div class="mb-3">
    <label for="nomeCurso" class="form-label">Nome do Curso</label>
    <input value="{{ $curso->name }}" type="text" name="name" class="form-control" id="nomeCurso">
  </div>
  <button class="btn btn-success">Alterar Curso</button>
</form>
@endsection
