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

<h1>Asignar notas</h1>
<form action="{{url('notas')}}" method="POST">
 @csrf
  <div class="form-group">
        <strong><label for="">Estudiante</label></strong><br>
        <select class="form-control" name="est"> 
          @foreach($items as $item)
          <option value="{{$item->id}}">{{$item->name.' '.$item->last_name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <strong><label for="">Nota</label></strong><br>
        <input type="text" class="form-control" name="nota_est" placeholder="Nota">
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection