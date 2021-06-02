@extends('layouts.default')

@section('content')
<div class="bg-light p-5 rounded">
  <h1>Bem-vindo</h1>
  <p class="lead">This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>

  <ul>
    @foreach($cursos as $curso)
    <li><a href="{{ url("/teste/{$curso->id}") }}">{{ $curso->name }}</a></li>
    @endforeach
  </ul>
</div>
@endsection
