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
        
        </table >

        <table class="table table-striped" border=1>
        <tr>
            <th>HORA INICIO</th>
            <th>HORA FIN</th>
        </tr>
        @forelse ($activity->sesions as $key => $sesion)
        <tr>
            <td>{{$sesion->horaFin}} </td>
            <td>{{$sesion->horaFin}} </td>
        </tr>
        @empty
        @endforelse
        </table>
        
        </table>
    </body>
</html>