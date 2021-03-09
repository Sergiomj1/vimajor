
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <div class="card-body">
<form action="{{route('video.create.post')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
<input type="text"  class="form-control" name="title" placeholder="Introduzca titulo">
    </div>
    <div class="form-group row">
<input type="file"  class="form-control " class="serieinput" name="video" placeholder="video">
    </div>
    <div class="form-group row">
    <input type="number"   class="form-control" name="duration" placeholder="duracion por minutos">
    </div>
<div>
    <textarea class="textareainput form-control" name="description" placeholder="descripcion"></textarea>
    <div class="form-group row">
        <div class="form-group row">
<input type="submit" value="Añadir video " class="btn btn-primary">
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

