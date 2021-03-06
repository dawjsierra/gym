@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Creación de actividades</h1>

            <form action="/activities" method="post">
                @csrf
                <div>
                    <label for="nomActividad">Nombre de la actividad</label>
                    <input type="text" name="nomActividad" id="nomActividad">
                    @error('nomActividad')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion">
                    @error('descripcion')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="duracion">Duracion (minutos)</label>
                    <input type="text" name="duracion" id="duracion">
                    @error('duracion')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="maxParticipantes">Numero máximo de participantes</label>
                    <input type="text" name="maxParticipantes" id="maxParticipantes">
                    @error('maxParticipantes')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="crear">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
