@extends('layouts.app')



@section('content')





    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Ultima vez actualizado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            <td><a  href="{{route('admin.edit', $user->id)}}"><button class="btn btn-sm btn-outline-primary">Editar</button></a></td>
            <td><form action="{{route('admin.destroy', $user->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger  btn-sm">Eliminar</button>
                 </form></td>

            </tr>
        @endforeach
        </tbody>
    </table>
    @parent

@stop
