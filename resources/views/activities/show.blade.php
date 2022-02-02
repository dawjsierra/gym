<!DOCTYPE html>
<html>
    <head>
        <title>SHOW ACTIVITIES</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <h1>ACTIVITIES</h1>
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
            <td> <a class="btn btn-primary btn-sm" href="/activities/{{$activity->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay estudios registrados</td>
        </tr>
        @endforelse
        </table>
    </body>
</html>