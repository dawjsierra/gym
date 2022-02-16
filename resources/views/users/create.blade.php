@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Crear usuario</h1>

        <form action="/users" method="post">
        @csrf

        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{old ('name')}}">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" value="{{old ('dni')}}">
            @error('dni')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{old ('email')}}">
            @error('email')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="{{old ('password')}}">
            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="weight">Peso</label>
            <input type="text" name="weight" id="weight" value="{{old ('weight')}}">
            @error('weight')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="height">Altura</label>
            <input type="text" name="height" id="height" value="{{old ('height')}}">
            @error('height')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="birth">Fecha Nacimiento</label>
            <input type="text" name="birth" id="birth" value="{{old ('birth')}}">
            @error('birth')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <label for="sex">Sexo</label>
            <input type="text" name="sexo" id="sexo" value="{{old ('sexo')}}">
            @error('sexo')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror 
        </div>

        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection