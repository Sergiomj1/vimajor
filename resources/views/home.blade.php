@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #7B78DB" class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(Auth::user()->hasRole('loaders','admin'))

                            <a style="color:white"  href="{{route('video.create')}}" class="btn btn-blue añadir" >Añadir video</a>



                        @endif

                        @if(Auth::user()->hasRole('admin'))

                            <a style="color:white"  href="{{route('admin.index')}}" class="btn btn-blue añadir" >Administrar usuarios</a>
                            <a style="color:white"  href="{{route('adminvideo.index')}}" class="btn btn-blue añadir" >Administrar videos</a>
                            <a style="color:white"  href="{{route('video.create')}}" class="btn btn-blue añadir" >Añadir video</a>



                        @endif


                        <a style="color:white" href="{{route('profiles.myprofile')}}" class="btn btn-blue añadir" >Ver Perfil</a>


                </div>

                <div style="background-color: #7B78DB" class="card-header"></div>

            </div>
        </div>
    </div>

{{--    <div class="emptyspace"></div>--}}

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}

{{--            <h1>Videos</h1>--}}

{{--        </div>--}}
{{--    </div>--}}

    <section class="text-center">
        <div class="container mt-5">
            <h1>Videos</h1>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($videos as $video)

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" >
                            {{--                        <video style="height: 225px; width: 100%; display: block;" src="/uploads/{{ $video->video }}" controls ></video>--}}
                            <video width="100%" height="200" controls poster="{{asset('/uploads'.$video->video)}}">
                                <source src="/uploads/{{ $video->video }}" type="video/mp4">
                                Tu navegador no soporta HTML5 video.
                            </video>
                            <div class="card-body">
                                <p class="card-text">{{$video-> title}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn-group" href="{{route('video.show', $video->id)}}">
                                         <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </a>

                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
        <div class="card-body">


        </div>
    </div>
</div>


@endsection
