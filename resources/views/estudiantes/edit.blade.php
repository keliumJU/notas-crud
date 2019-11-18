@extends('layouts.app')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<h1>Editar estudiante</h1>
<form action="{{ url('estudiantes/' . $est->id) }}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <strong><label for="name">Nombres</label></strong>
    <input type="text" class="form-control" id="name" name="name" value="{{$est->name}}" >
  </div>
  <div class="form-group">
    <strong><label for="last_name">Apellidos</label></strong>
     <input type="text" class="form-control" id="name" name="last_name" value="{{$est->last_name}}" >
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection