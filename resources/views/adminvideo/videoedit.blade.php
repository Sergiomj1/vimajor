@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('adminvideo.update', $video->id) }}" >
                        @method ('PUT')
                        @csrf
                        <div class="form-group row">
                            <input type="text"  class="form-control" name="title" value="{{ $video->title}}" placeholder="Introduzca titulo">
                        </div>
                        <div class="form-group row">
                            <input type="file"  class="form-control " value="{{ $video->video}}" class="serieinput" name="video" placeholder="video">
                        </div>
                        <div class="form-group row">
                            <input type="number"   class="form-control" value="{{ $video->duration}}" name="duration" placeholder="duracion por minutos">
                        </div>

                        <div class="form-group row">
                            <input type="text"  class="form-control" name="description" value="{{ $video->description}}" placeholder="Introduzca titulo">
                        </div>


                            <div class="form-group row">
                                <div class="form-group row">
                                    <input type="submit" value="Añadir video " class="btn btn-primary">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

