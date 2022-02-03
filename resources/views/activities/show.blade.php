<!DOCTYPE html>
<html>
    <head>
        <title>SHOW ACTIVITIES</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <h1>ACTIVITY: {{$activity->nomActividad}}</h1>
        <table class="table table-striped" border=1>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Duracion</th>
            <th>Nº Maximo participantes</th>
        </tr>
        
        <tr>
            <td>{{$activity->nomActividad}} </td>
            <td>{{$activity->descripcion}} </td>
            <td>{{$activity->duracion}} </td>
            <td>{{$activity->maxParticipantes}} </td>
        </tr>
        
        </table>

        <h1>sesiones</h1>
        <table class="table table-striped" border=1>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Duracion</th>
            <th>Nº Maximo participantes</th>
        </tr>
        
        <tr>
            <td>{{$activity->nomActividad}} </td>
            <td>{{$activity->descripcion}} </td>
            <td>{{$activity->duracion}} </td>
            <td>{{$activity->maxParticipantes}} </td>
        </tr>
        
        </table>
    </body>
</html>