@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de estudios
            <a href="/users/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Peso</th>
            <th>Altura</th>
            <th>Fecha Nacimiento</th>
    
        </tr>
        @forelse ($users as $users)
        <tr>
            <td>{{$users->name}} </td>
            <td>{{$users->dni}} </td>
            <td>{{$users->email}} </td>
            <td>{{$users->password}} </td>
            <td>{{$users->peso}} </td>
            <td>{{$users->altura}} </td>
            <td>{{$users->fechaNac}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/users/{{$users->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/users/{{$users->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay estudios registrados</td>
        </tr>
        @endforelse
        </table>





        </div>
    </div>
</div>
@endsection