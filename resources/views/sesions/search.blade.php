<!DOCTYPE html>
<html>
    <head>
        <title>BUSQUEDA SESIONES</title>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="/js/search.js"></script>
    </head>

    <body>
        <h1>BUSQUEDA SESIONES</h1>
        
        <table border="1">
        ACTIVIDADES
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
            <tr>
                @foreach($activities as $activity)
                <tr>
                    <td>{{$activity->id}}</td>
                    <td>{{$activity->nomActividad}}</td>
                </tr>
                @endforeach
            </tr>
        </table>
        <br><br><hr><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <form method="GET" action="javascript:;">
        <label>Buscar por nombre actividad</label>
        <input type="text" id="nombre" name="nombre">
        <label>Buscar por fecha</label>
        <input type="date" id="date" name="date">
        <input type="hidden" id="user_id" name="user_id" value="{{$activity->id}}">
        <input id="boton" type="submit"  value="Buscar">
        
    </form>
    <table id="tabla">
    </table>


        </div>
    </div>
</div>
    
    </body>
</html> 