@extends('layouts.default')

@section('content')
<h2>Cursos</h2>

<div style="margin-bottom: 16px;">
  <a href="{{ url("/cursos/create") }}" class="btn btn-primary">Adicionar Curso</a>
</div>

<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Nome do Curso</th>
      <th class="text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cursos as $curso)
    <tr>
      <td class="text-center">{{ $curso->id }}</td>
      <td class="text-center">{{ $curso->name }}</td>
      <td class="text-center">
        <a href="{{ url("/cursos/edit/{$curso->id}") }}" class="btn btn-success btn-sm">Editar</a>
        <a onclick="return confirm('Você confirma a exclusão?')" href="{{ url("/cursos/destroy/{$curso->id}") }}" class="btn btn-danger btn-sm">Deletar</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
