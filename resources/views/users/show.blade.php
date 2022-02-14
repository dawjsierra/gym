<!DOCTYPE html>
<html>
    <head>
        <title>USER {{$users->name}} </title>
        <meta charset="UTF-8">
    </head>
    
    <body>
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



        
    </body>
</html>