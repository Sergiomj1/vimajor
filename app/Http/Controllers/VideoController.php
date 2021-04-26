<?php

namespace App\Http\Controllers;


use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VideoController extends Controller
{

    public function index(Request $request)
    {
        return view('home',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Request $request)
    {
        $request->user()->authorizeRoles(['loaders','admin']);
        return view('video/videocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if ($request->file() && $request->title && $request->description && $request->duration) {

            $video = new Video();

            $file = $request->file('video');
            $path = $file->store('video', ['disk' => 'public_uploads']);

            $id = Auth::user()->id;

            $video->video = $path;
            $video->title = $request->title;
            $video->description = $request->description;
            $video->duration = $request->duration;
            $video->user_id = $id;


            if( $video->save() ) {
                return redirect()->route('home');
            }


        }

        return 'ha habido un error';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video= Video::find($id);
        return view('video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('video');
    }
}


