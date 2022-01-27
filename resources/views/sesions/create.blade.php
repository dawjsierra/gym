<!DOCTYPE html>
<html>
    <head>
        <title>SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>CREAR SESIONES</h1>

        <form method="POST" action="/sesion/store">
            <input type="checkbox" id="lunes" name="lunes" value="l">
            <label for="dia1">LUNES</label><br>

            <input type="checkbox" id="martes" name="martes" value="m">
            <label for="dia2"> MARTES</label><br>

            <input type="checkbox" id="miercoles" name="miercoles" value="x">
            <label for="dia3"> MIERCOLES</label><br> 

            <input type="checkbox" id="jueves" name="jueves" value="j">
            <label for="dia4"> JUEVES </label><br>

            <input type="checkbox" id="viernes" name="viernes" value="v">
            <label for="dia5"> VIERNES</label>

            <br/><hr><br/>

            <label>HORA INICIO</label>
            <input type="time" id="horaInicio" name="horaInicio"><br/>

            <br/><hr><br/>

            <label>HORA FIN</label>
            <input type="time" id="horaFin" name="horaFin"><br/>

            <br/><hr><br/>


        </form>
    </body>
</html>