<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        /* $request->user()->authorizeRoles(['admin']);
        return view('admin.index'); */
        $videos = Video::all();
        return view('adminvideo.dashvideo', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video=Video::find($id);

        return view('adminvideo.videoedit',compact('video'));

    }


    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        $file = $request->file('video');
        $path = $file->store('video', ['disk' => 'public_uploads']);

        $video=Video::find($id);
        $video->update([  'title'=>$request->title,
            'video'=>$path,
            'description'=>$request->description,
            'duration'=>$request->duration,


        ]);


        return redirect()->route('adminvideo.index');
    }

    public function destroy(Request $request,  $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('adminvideo.index');
    }


}
