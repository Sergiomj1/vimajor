@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">


                <div class="col-md-12">
                    <video width="100%" height="700" controls poster="{{asset('/uploads'.$video->video)}}">
                        <source src="/uploads/{{ $video->video }}"type="video/mp4">

                    </video>

                    <p style="font-size:30px; color: white" class="card-text">{{$video-> title}}</p>

                    <p style="font-size:25px; color: white" class="card-text">{{$video-> description}}</p>
                </div>



        </div>

    </div>




@endsection