@extends('layouts.app')
@section('title', 'Estudiantes')

@section('content')
<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9">
						<h2>Administrar <b>Notas</b></h2>
					</div>
					<div class="col-sm-3">
						<a href="{{url('notas/create')}}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Agregar Notas</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>##</th>     
                        <th>Estudiante</th>
                        <th>Promedio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_est_prom as $list)
                    <tr>
                        <td>{{$list->ident}}</td>
                        <td>{{$list->nombre.' '.$list->apellido}}</td>
                        <td>{{$list->promedio}}</td>
                        <td>
                            <a class="btn btn-success" 
                                href="{{ route('notas.edit', [$list->ident]) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
               </tbody>
@endsection