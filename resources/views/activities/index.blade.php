@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de actividades</h1><br/>
            <a href="/activities/create" class="btn btn-primary float-right">Nueva</a><br/>
        


        <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Duracion</th>
            <th>Nº Maximo participantes</th>
        </tr>
        @forelse ($activities as $key => $activity)
        <tr>
            <td>{{$activity->nomActividad}} </td>
            <td>{{$activity->descripcion}} </td>
            <td>{{$activity->duracion}} </td>
            <td>{{$activity->maxParticipantes}} </td>
            
            <td> <a class="btn btn-primary btn-sm" href="/activity/{{$activity->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/activity/{{$activity->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay estudios registrados</td>
        </tr>
        @endforelse
        </table>





        </div>
    </div>
</div>
@endsection