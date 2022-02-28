@extends('layouts.app')

@section('content')

<h1>ACTIVIDADES</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if ( $rolusuario == "admin" )
        <div class="row">    <a href="/activities/create" class="btn btn-primary float-right">CREAR ACTIVIDAD</a><br /> </div>
    
                    @endif



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

                    <td> <a class="btn btn-primary btn-sm" href="/activities/{{$activity->id}}">Ver</a></td>
                    @if ( $rolusuario == "admin" )
                     <td> <a class="btn btn-primary btn-sm" href="/activities/{{$activity->id}}/edit">Editar</a></td>
                    @endif
                   
                    
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
