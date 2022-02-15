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
                    <input type="text" name="nomActividad">
                </div>

                <div>
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion">
                </div>

                <div>
                    <label for="duracion">Duracion (minutos)</label>
                    <input type="text" name="duracion">
                </div>

                <div>
                    <label for="maxParticipantes">Numero máximo de participantes</label>
                    <input type="text" name="maxParticipantes">
                </div>

                <div>
                    <input type="submit" value="crear">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
