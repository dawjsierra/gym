<!DOCTYPE html>
<html>
    <head>
        <title>SHOW SESION {{$sesions->id}} </title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <h1>SESION {{$sesions->id}}: {{$activity->nomActividad}}</h1>
        <table class="table table-striped" border=1>
        <tr>
            <th>Actividad</th>
            <th>Inicio</th>
            <th>Fin</th>
        </tr>
        
        <tr>
            <td>{{$activity->nomActividad}} </td>
            <td>{{$sesions->horaInicio}} </td>
            <td>{{$sesions->horaFin}} </td>
        </tr>
        
        </table >
    </body>
</html>