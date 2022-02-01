<!DOCTYPE html>
<html>
    <head>
        <title>SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>CREAR SESIONES</h1>

        <form method="POST" action="/sesion">
        @csrf

            <select name="actividad" id="actividad">
                @foreach($activities as $activity)
                    <option value="{{$activity->id}}">{{$activity->nomActividad}}</option>
                @endforeach
            </select>

            <br/><hr><br/>

            <input type="checkbox" id="lunes" name="dias[]" value="Monday">
            <label for="dia1">LUNES</label><br>

            <input type="checkbox" id="martes" name="dias[]" value="Tuesday">
            <label for="dia2"> MARTES</label><br>

            <input type="checkbox" id="miercoles" name="dias[]" value="Wednesday">
            <label for="dia2"> MIERCOLES</label><br>

            <input type="checkbox" id="jueves" name="dias[]" value="Thursday">
            <label for="dia4"> JUEVES </label><br>

            <input type="checkbox" id="viernes" name="dias[]" value="Friday">
            <label for="dia5"> VIERNES</label>

            <br/><hr><br/>

            <label>HORA INICIO</label>
            <input type="time" id="horaInicio" name="horaInicio"><br/>

            <br/><hr><br/>

            <label>HORA FIN</label>
            <input type="time" id="horaFin" name="horaFin"><br/>

            <br/><hr><br/>

            <label>DIa de inicio</label>
            <input type="date" id="day" name="day"><br/>

            <br/><hr><br/>
            <input type="submit" value="CREAR">
        </form>
    </body>
</html>