@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Actualización de estudios</h1>

        <form action="/users/{{$user->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="name" value="{{$user->nomActividad}}"> 
        </div>

        <div>
            <label for="dni">dni</label>
            <input type="text" name="dni" value="{{$user->dni}}"> 
        </div>

        <div>
            <label for="email">email</label>
            <input type="text" name="email" value="{{$user->email}}"> 
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="text" name="password" value="{{$user->password}}"> 
        </div>

        <div>
            <label for="peso">peso</label>
            <input type="text" name="peso" value="{{$user->peso}}"> 
        </div>

        <div>
            <label for="altura">altura</label>
            <input type="text" name="altura" value="{{$user->altura}}"> 
        </div>

        <div>
            <label for="fechaNac">fecha Nacimiento</label>
            <input type="text" name="fechaNac" value="{{$user->fechaNac}}"> 
        </div>

        <div>
            <label for="sexo">sexo</label>
            <input type="text" name="sexo" value="{{$user->sexo}}"> 
        </div>

        
        <div>
            <input type="submit" value="actualizar"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection