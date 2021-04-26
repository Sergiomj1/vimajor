@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <h1 style="color:white">Tus Datos</h1>
                <h1 style="color:white">{{ $user->name }}</h1>
                <h3 style="color:white">{{ $user->email }}</h3>
                <h3 style="color:white">{{ $user->created_at }}</h3>
                <h3 style="color:white"></h3>
            </div>
            <div class="col-12 my-3 pt-3 shadow">

                <a style="color:white" href="{{route('profiles.changename')}}" class="btn btn-blue añadir" >Cambiar Username</a>
                <a style="color:white" href="{{route('profiles.changeemail')}}" class="btn btn-blue añadir" >Cambiar Correo</a>
                <a style="color:white" href="{{route('profiles.updatepassword')}}" class="btn btn-blue añadir" >Cambiar Password</a>


            </div>
        </div>
    </div>

@endsection