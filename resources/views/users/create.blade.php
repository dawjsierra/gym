@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Crear usuario</h1>

        <form action="/studies" method="post">
        @csrf
        <div>
            <label for="dni">DNI</label>
            <input type="text" name="dni"> 
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email"> 
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="text" name="password"> 
        </div>

        <div>
            <label for="weight">Peso</label>
            <input type="text" name="weight"> 
        </div>

        <div>
            <label for="height">Altura</label>
            <input type="text" name="height"> 
        </div>

        <div>
            <label for="birth">Fecha Nacimiento</label>
            <input type="text" name="birth"> 
        </div>

        <div>
            <label for="sex">Sexo</label>
            <input type="text" name="sex"> 
        </div>

        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection