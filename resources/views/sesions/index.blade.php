<!DOCTYPE html>
<html>
    <head>
        <title>SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>SESIONES</h1>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de SESIONES
            <a href="/activities/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
        @forelse ($sesiones as $sesiones)
        <tr>
            <td>{{$sesiones->horaInicio}} </td>
            <td>{{$sesiones->horaFin}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesions->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/activities/{{$sesions->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay sesiones registradas</td>
        </tr>
        @endforelse
        </table>





        </div>
    </div>
</div>
@endsection
        </form>
    </body>
</html>