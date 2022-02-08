<!DOCTYPE html>
<html>
    <head>
        <title>RESERVAR SESION</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>RESERVAR SESION</h1>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <form method="POST" action="/sesion/sign">
        @csrf
        <!--select con las actividades-->
        <select name="actividad" id="actividad">
            @foreach($activities as $activity)
                <option value="{{$activity->id}}">{{$activity->nomActividad}}</option>
            @endforeach
        </select>

            @if($user->status =='waiting')         
                <td><a href="#" class="viewPopLink btn btn-default1" role="button" data-id="{{ $user->travel_id }}" data-toggle="modal" data-target="#myModal">Approve/Reject<a></td>         
            @else
                <td>{{ $user->status }}</td>        
            @endif
                 




    
    </form>

        </div>
    </div>
</div>
@endsection
       
    </body>
</html>