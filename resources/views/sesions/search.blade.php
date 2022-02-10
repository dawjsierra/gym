<!-- <!DOCTYPE html>
<html>
    <head>
        <title>BUSQUEDA SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>BUSQUEDA SESIONES</h1>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <form method="POST" action="/sesion">

        <!--select con las actividades-->
        <select name="actividad" id="actividad">
            @foreach($activities as $activity)
                <option value="{{$activity->id}}">{{$activity->nomActividad}}</option>
            @endforeach
            @define $activ = {{$activity->id}}
        </select>

        <table border=1>
            <tr>
                <th>HORA INICIO</th>
                <th>HORA FIN</th>
            </tr>
            <tr>
                @foreach($sesions as $sesiones)
                    @if($sesiones->id_act == $activ)
                        <td>{{$sesiones->horaInicio}} </td>
                        <td>{{$sesiones->horaFin}} </td>
                    @endif
                @endforeach
            </tr>
        </table>
    </form>

        </div>
    </div>
</div>
@endsection
       
    </body>
</html> -->