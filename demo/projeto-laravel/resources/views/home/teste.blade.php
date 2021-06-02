@extends('layouts.default')

@section('content')
<div class="bg-light p-5 rounded">
  <h1>Teste {{ $nome }}?!</h1>
  <p><?php echo $nome; ?></p>
</div>
@endsection
