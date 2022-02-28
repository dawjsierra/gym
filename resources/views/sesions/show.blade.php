@extends('layouts.app')

@section('content')

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
            <th>Usuarios inscritos</th>
        </tr>

        <tr>
            <td>{{$activity->nomActividad}} </td>
            <td>{{$sesions->horaInicio}} </td>
            <td>{{$sesions->horaFin}} </td>
            <td>{{$usuariosInscritos}} </td>
        </tr>
        
    </table>
</body>

</html>
@endsection
