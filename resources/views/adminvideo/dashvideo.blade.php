@extends('layouts.app')



@section('content')

    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">video</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Ultima vez actualizado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <th scope="row">{{$video->id}}</th>
                <td>{{$video->title}}</td>
                <td>{{$video->video}}</td>
                <td>{{$video->created_at}}</td>
                <td>{{$video->updated_at}}</td>
                <td><a  href="{{route('adminvideo.edit', $video->id)}}"><button class="btn btn-sm btn-outline-primary">Editar</button></a></td>
                <td><form action="{{route('adminvideo.destroy', $video->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger  btn-sm">Eliminar</button>
                    </form></td>

        @endforeach
        </tbody>
    </table>
    @parent

@stop
