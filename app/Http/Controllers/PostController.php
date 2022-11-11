<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post_images;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backEnd.posts.show',compact('posts'));
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.posts.create');
    }//end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this-> validate($request, [
            'header_title'=> 'required',
            'header_title_ar'=> 'required',
            'header_image'=> 'required',
            'post_title'=> 'required',
            'post_title_ar'=> 'required',
            'post_body'=> 'required',
            'post_body_ar'=> 'required',
        ]);

        $post = new Post;
                
        $file = $request->file('header_image');
        // Get Original filename with the extension
        $filenameWithExt = $file->getClientOriginalName();
        // Filename to store without spaces
        $fileNameToStore = str_replace(' ', '', $filenameWithExt);
        // Upload file
        // to store in public
        //public path
        $post_path = str_replace(' ', '',$request->post_title);
        $path = $file->move('attachments/'.$post_path .'/headerImage/', $fileNameToStore);

        $post->header_image = $path;
        $post->header_title = $request->header_title;
        $post->header_title_ar = $request->header_title_ar;
        $post->post_title = $request->post_title;
        $post->post_title_ar = $request->post_title_ar;
        $post->post_body = $request->post_body;
        $post->post_body_ar = $request->post_body_ar;
        $post->save();

        if($request->hasFile('imgs')){
            $files = $request->file('imgs');
            $post_id = post::latest()->first()->id;
            $post_title = post::latest()->first()->post_title;
        
            foreach ($files as $file) {
                // Get Original filename with the extension
                $filenameWithExt = $file->getClientOriginalName();
                // Filename to store without spaces
                $fileNameToStore = str_replace(' ', '', $filenameWithExt);
                // Upload file
                // to store in public
                //publickpath
                $post_path = str_replace(' ', '',$post_title);
                $path = $file->move('attachments/'.$post_path.'/postImages/', $fileNameToStore);
                $images = new post_images;

                $images->post_id = $post_id;
                $images->post_title = $post_title;
                $images->path = $path;
                $images->save();
            }
        }
        return redirect(route('post.index'))->with('success','Post Created successfully');
    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = post_images::where('post_id' ,$id )->get();
        $post = Post::where('id',$id)->first();
        $post_path = str_replace(' ', '',$post->post_title);
        return view('backEnd.posts.edit',compact('post','post_path','images'));
    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            'header_title'=> 'required',
            'header_title_ar'=> 'required',
            'post_title'=> 'required',
            'post_title_ar'=> 'required',
            'post_body'=> 'required',
            'post_body_ar'=> 'required',
        ]);

        $post = Post::find($id);

            if($request->hasFile('header_image')){

            $file = $request->file('header_image');
            // Get Original filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Filename to store without spaces
            $fileNameToStore = str_replace(' ', '', $filenameWithExt);
            // Upload file
            // to store in public
            //public path
            $post_path = str_replace(' ', '',$post->post_title);
            $path = $file->move('attachments/'.$post_path .'/headerImage/', $fileNameToStore);
            $post->header_image = $path;
        }
        
        $post->header_title = $request->header_title;
        $post->header_title_ar = $request->header_title_ar;
        $post->post_title = $request->post_title;
        $post->post_title_ar = $request->post_title_ar;
        $post->post_body = $request->post_body;
        $post->post_body_ar = $request->post_body_ar;
        $post->save();
        
        if($request->hasFile('imgs')){
            $files = $request->file('imgs');
            $post_id = post::latest()->first()->id;
            $post_title = post::latest()->first()->post_title;
        
            foreach ($files as $file) {
                // Get Original filename with the extension
                $filenameWithExt = $file->getClientOriginalName();
                // Filename to store without spaces
                $fileNameToStore = str_replace(' ', '', $filenameWithExt);
                // Upload file
                // to store in public
                //publickpath
                $post_path = str_replace(' ', '',$post_title);
                $path = $file->move('attachments/'.$post_path.'/postImages/', $fileNameToStore);
                $images = new post_images;

                $images->post_id = $post_id;
                $images->post_title = $post_title;
                $images->path = $path;
                $images->save();
            }
        }
        return redirect(route('post.index'))->with('success','Post Updated successfully');
    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::where('id',$id)->first();
        $post_path = str_replace(' ', '',$post->post_title);

        Storage::disk('public_uploads')->deleteDirectory($post_path);
        
        $post->forceDelete();
        return redirect()->back()->with('delete','Post Deleted successfully');
    }//end of desroy
}//end of PostController
