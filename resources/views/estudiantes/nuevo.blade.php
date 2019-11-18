@extends('layouts.app')
@section('title', 'Estudiantes')
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

<h1>Crear nuevo estudiante</h1>
<form action="{{url('estudiantes')}}" method="POST">
 @csrf
  <div class="form-group">
      <strong><label for="">Nombre</label></strong>
      <input type="text" class="form-control" name="name" placeholder="Nombres">
  </div>
  <div class="form-group">
        <strong><label for="">Apellido</label></strong><br>
        <input type="text" class="form-control" name="last_name" placeholder="Apellidos">
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection