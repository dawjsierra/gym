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
            <a href="/sesions/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>
 <!--select con las actividades-->
 <select name="actividad" id="actividad">
            @foreach($activities as $activity)
                <option value="{{$activity->id}}">{{$activity->nomActividad}}</option>
            @endforeach
            @define $activ = {{$activity->id}}
        </select>

        <table class="table table-striped">
        <tr>
            <th>Actividad</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
        @forelse ($sesions as $key => $sesion)
        
        <tr>
            <td>{{$sesion->activity->nomActividad}} </td>
            <td>{{$sesion->horaInicio}} </td>
            <td>{{$sesion->horaFin}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay sesiones registradas</td>
        </tr>
        @endforelse
        </table>

        <hr>
        <h2>BUSQUEDA AJAX</h2>
        <form action="" id="formulario">
            <input type="text" id="filtro">
            <input type="submit">
        </form>
        <br/>
        <div id="destinofiltro">
            destino filtro...
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="/js/ejemploajax.js"></script>
        
        </div>
    </div>
</div>
@endsection
        </form>
    </body>
</html>