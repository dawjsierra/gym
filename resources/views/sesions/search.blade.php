<!DOCTYPE html>
<html>
    <head>
        <title>BUSQUEDA SESIONES</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>BUSQUEDA SESIONES</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <form method="GET" action="javascript:;">
        <label>Buscar por nombre actividad</label>
        <input type="text" id="nombre" name="nombre">
        <label>Buscar por fecha</label>
        <input type="date" id="date" name="date">
        <input id="boton" type="submit"  value="Buscar">
        
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/search.js"></script>

    <div id="errores">
        
    </div>

    <table id="#tabla">
        
    </table>

        </div>
    </div>
</div>
       
    </body>
</html> 