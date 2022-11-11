<?php

namespace App\Http\Controllers;

use App\aboutUs_video;
use Illuminate\Http\Request;

class AboutUsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = aboutUs_video::all();
        return view('backEnd.aboutUs.show',compact('videos'));
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.aboutUs.create');
    }//end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request, [
            'video_title'=> 'required',
            'video_url'=> 'required',
            
        ]);

        $video = new aboutUs_video;
        $video->video_title = $request->video_title;
        $video->video_url = $request->video_url;
        $video->save();
        return redirect(route('video-url.index'))->with('success','Video Added successfully');
    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\aboutUs_video  $aboutUs_video
     * @return \Illuminate\Http\Response
     */
    public function show(aboutUs_video $aboutUs_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aboutUs_video  $aboutUs_video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = aboutUs_video::where('id',$id)->first();
        return view('backEnd.aboutUs.edit',compact('video'));
    }//end of edit


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aboutUs_video  $aboutUs_video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            'video_title'=> 'required',
            'video_url'=> 'required',
            
        ]);

        $video = aboutUs_video::find($id);
        $video->video_title = $request->video_title;
        $video->video_url = $request->video_url;
        $video->save();
        return redirect(route('video-url.index'))->with('success','Video URL Updated successfully');
    }//end of update


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aboutUs_video  $aboutUs_video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        aboutUs_video::where('id',$id)->delete();
        return redirect()->back()->with('delete','Video URL Deleted successfully');
    }//end of desroy
}
