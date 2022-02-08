@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Actualización de estudios</h1>

        <form action="/activity/{{$activity->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nomActividad" value="{{$activity->nomActividad}}"> 
        </div>

        <div>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" value="{{$activity->descripcion}}"> 
        </div>

        <div>
            <label for="duracion">Duracion</label>
            <input type="text" name="duracion" value="{{$activity->duracion}}"> 
        </div>

        <div>
            <label for="maxParticipantes">Maximo Participantes</label>
            <input type="text" name="maxParticipantes" value="{{$activity->maxParticipantes}}"> 
        </div>

        <div>
            <input type="submit" value="actualizar"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection