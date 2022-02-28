@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>USER {{$users->name}} </title>
    <meta charset="UTF-8">
</head>

<body>

            @if ( $rolusuario == "admin" )
            <div class="row"> 
            <a href="/users" class="btn btn-primary ">VER A LOS USUARIOS</a><br />
            <a href="/users/create" class="btn btn-primary ">CREAR USUARIO</a><br />
            </div>
     
            @endif

    <h1>USUARIO: {{$users->id}}: {{$users->name}}</h1>
    <h3>DATOS DE {{$users->name}}:</h3>
    <table class="table table-striped" border=1>
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Correo</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Fecha de nacimiento</th>
            <th>Sexo</th>
            <th>Rol</th>
        </tr>

        <tr>
            <td>{{$users->name}} </td>
            <td>{{$users->dni}} </td>
            <td>{{$users->email}} </td>
            <td>{{$users->altura}} </td>
            <td>{{$users->peso}} </td>
            <td>{{$users->fechaNac}} </td>
            <td>{{$users->sexo}} </td>
            <td>{{$users->role}} </td>
        </tr>
    </table>
    <hr><br>
    <table class="table table-striped" style="text-align:center;" border=1>
        <tr>

            <th>Actividad</th>
            <th>ID SESION</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
        @forelse ($sesiones_usuario as $key => $sesion)
        <tr>
            <td>{{$sesion->activity->nomActividad}} </td>
            <td>{{$sesion->id}} </td>
            <td>{{$sesion->horaInicio}} </td>
            <td>{{$sesion->horaFin}} </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay datos que mostrar</td>
        </tr>
        @endforelse
    </table>
</body>

</html>
@endsection
