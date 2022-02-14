<!DOCTYPE html>
<html>
    <head>
        <title>SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>SESIONES</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <a href="/sesions/create" class="btn btn-primary float-right">CREAR SESIÓN</a><br/>

        <h1>¡Hola {{$user}}! Aquí mostramos las sesiones</h1><br/>
        
        <form method="post" action="sesions/findSelect/">
            <!--select con las actividades-->
            <select name="actividad" id="actividad">
            @foreach($activities as $activity)
                <option value="{{$activity->id}}">{{$activity->nomActividad}}</option>
            @endforeach
            </select>
            <input type="submit" value="Buscar">
        </form>

        <br/>
        <table class="table table-striped" style="text-align:center;" border=1>
        <tr>
            <th>ID</th>
            <th>Actividad</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
        @forelse ($sesions as $key => $sesion)
        
        <tr>
            <td>{{$sesion->id}} </td>
            <td>{{$sesion->activity->nomActividad}} </td>
            <td>{{$sesion->horaInicio}} </td>
            <td>{{$sesion->horaFin}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/show/{{$sesion->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/sign/{{$sesion->id}}">Inscribirse</a></td>
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
        </form>
    </body>
</html>