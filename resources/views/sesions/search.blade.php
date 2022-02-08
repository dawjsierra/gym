<!DOCTYPE html>
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
        </select>
    
    </form>

        </div>
    </div>
</div>
@endsection
       
    </body>
</html>