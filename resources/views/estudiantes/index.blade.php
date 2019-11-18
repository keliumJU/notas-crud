@extends('layouts.app')
@section('title', 'Estudiantes')

@section('content')
<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9">
						<h2>Administrar <b>estudiantes</b></h2>
					</div>
					<div class="col-sm-3">
						<a href="{{url('estudiantes/create')}}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Nuevo estudiante</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>##</th>     
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_estudiantes as $estudiantes)
                    <tr>
				        <td>{{$estudiantes->id}}</td>
                        <td>{{$estudiantes->name}}</td>
                        <td>{{$estudiantes->last_name}}</td>
                        <td>
                            <form action="{{ route('estudiantes.destroy', [$estudiantes->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success" 
                                        href="{{ route('estudiantes.edit', [$estudiantes->id]) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button class="btn btn-danger" >
                                        <i class="fa fa-trash"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
@endsection