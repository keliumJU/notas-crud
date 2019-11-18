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

<h1>Editar Notas</h1>
<form action="{{ url('notas/' . $est->id) }}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <strong><label for="name">{{'Estudiante: '.$est->name.' '.$est->last_name}} </label></strong>
  </div>
  
  @php ($i = 0)
  <div class="form-group">
    <table class="table">
  @foreach($est_notas as $nota)
   <tr> 
    <td>
   <span>{{$i=$i+1}}</span></td>
  <td>  <input type="text" class="form-control" name="nota_est[{{$nota->id}}]" placeholder="{{$nota->nota}}"></td>
   </tr>
  @endforeach
      </table>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection