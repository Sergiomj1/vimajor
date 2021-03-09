@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <h1>Tus Datos</h1>
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3>
                <h3>{{ $user->created_at }}</h3>
                <h3></h3>
            </div>
            <div class="col-12 my-3 pt-3 shadow">

                <a href="{{route('profiles.changename')}}" class="btn btn-blue añadir" >Cambiar Username</a>
                <a href="{{route('profiles.changeemail')}}" class="btn btn-blue añadir" >Cambiar Correo</a>
                <a href="{{route('profiles.updatepassword')}}" class="btn btn-blue añadir" >Cambiar Password</a>


            </div>
        </div>
    </div>

@endsection