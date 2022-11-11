<?php

namespace App\Http\Controllers;

use App\home_slider;
use App\post_images;
use App\post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = home_slider::all();
        return view('backEnd.home_slider.show',compact('sliders'));
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = DB::table('posts')->select('id', 'post_title')->get();
        return view('backEnd.home_slider.create',compact('posts'));
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
            'slider_title'=> 'required',
            'slider_title_ar'=> 'required',
            'slider_subtitle'=> 'required',
            'slider_subtitle_ar'=> 'required',
            'slider_image'=> 'required',
            'btn_name'=> 'required',
            'btn_name_ar'=> 'required',
        ]);
            $slider = new home_slider;

            $file = $request->file('slider_image');
            // Get Original filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Filename to store without spaces
            $fileNameToStore = str_replace(' ', '', $filenameWithExt);
            // Upload file
            // to store in public
            //public path
            $slider_path = str_replace(' ', '',$request->slider_title);
            $path = $file->move('attachments/'.$slider_path , $fileNameToStore);
            $slider->slider_image = $path;

            if(!empty($request->btn_link)){
                $slider->btn_link = $request->btn_link;
            }else
            {
                $slider->post_id =$request->post_id;
            }

            $slider->slider_title = $request->slider_title;
            $slider->slider_title_ar = $request->slider_title_ar;
            $slider->slider_subtitle = $request->slider_subtitle;
            $slider->slider_subtitle_ar = $request->slider_subtitle_ar;
            $slider->btn_name = $request->btn_name;
            $slider->btn_name_ar = $request->btn_name_ar;
            
            $slider->save();
            return redirect(route('home-slider.index'))->with('success','Slider Created successfully');
    }//end of store

        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = post_images::where('post_id' ,$id )->get();
        $post = post::where('id',$id)->first();
        return view('front.blog',compact('post','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = DB::table('posts')->select('id', 'post_title')->get();
        $slider = home_slider::where('id',$id)->first();
        return view('backEnd.home_slider.edit',compact('slider','posts'));
    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            'slider_title'=> 'required',
            'slider_title_ar'=> 'required',
            'slider_subtitle'=> 'required',
            'slider_subtitle_ar'=> 'required',
            'btn_name'=> 'required',
            'btn_name_ar'=> 'required',
        ]);
            $slider =  home_slider::where('id',$id)->first();
            if($request->hasFile('slider_image')){
                $file = $request->file('slider_image');
                // Get Original filename with the extension
                $filenameWithExt = $file->getClientOriginalName();
                // Filename to store without spaces
                $fileNameToStore = str_replace(' ', '', $filenameWithExt);
                // Upload file
                // to store in public
                //public path
                $slider_path = str_replace(' ', '',$request->slider_title);
                $path = $file->move('attachments/'.$slider_path , $fileNameToStore);
                $slider->slider_image = $path;
            }

            if(!empty($request->btn_link)){
                $slider->btn_link = $request->btn_link;
            }else
            {
                $slider->post_id =$request->post_id;
            }

            $slider->slider_title = $request->slider_title;
            $slider->slider_title_ar = $request->slider_title_ar;
            $slider->slider_subtitle = $request->slider_subtitle;
            $slider->slider_subtitle_ar = $request->slider_subtitle_ar;
            $slider->btn_name = $request->btn_name;
            $slider->btn_name_ar = $request->btn_name_ar;
            $slider->save();
            return redirect(route('home-slider.index'))->with('success','Slider Updated successfully');
    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = home_slider::where('id',$id)->first();
        $slider_path = str_replace(' ', '',$slider->slider_title);

        Storage::disk('public_uploads')->deleteDirectory($slider_path);
       
        $slider->forceDelete();
        return redirect()->back()->with('delete','Slider Deleted successfully');
    }//end of desroy
}
