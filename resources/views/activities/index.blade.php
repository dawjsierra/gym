@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de estudios
            <a href="/activities/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Duracion</th>
            <th>Nº Maximo participantes</th>
        </tr>
        @forelse ($activities as $activities)
        <tr>
            <td>{{$activities->nomActividad}} </td>
            <td>{{$activities->descripcion}} </td>
            <td>{{$activities->duracion}} </td>
            <td>{{$activities->maxParticipantes}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/activities/{{$activities->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/activities/{{$activities->id}}/edit">Editar</a></td>
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