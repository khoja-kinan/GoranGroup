<?php

namespace App\Http\Controllers;

use App\company;
use App\img;
use App\file;
use App\post;
use App\aboutUs_video;
use App\home_slider;
use App\post_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CompanyPagesController extends Controller
{
    public function showHome()
    {
        $companies = DB::table('companies')->select('id', 'logo')->get();
        $sliders = home_slider::all();
        return view('front.home',compact('companies','sliders'));
    }//end of index

    public function show($id)
    {   
        $files = file::where('company_id' ,$id )->get();
        $images = img::where('company_id' ,$id )->get();
        $company = company::where('id',$id)->first();
        $company_path = str_replace(' ', '',$company->company_name_english);
       
        return view('front.company_single_page',compact('company','images','files','company_path'));
    }//end of show

    

    public function aboutUs()
    {
        $video = aboutUs_video::latest()->first();
        return view('front.about_us',compact('video'));
    }//end of aboutUs

    public function get_file($company_name,$file_name)
    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix(($company_name.'/catalogs/'.$file_name));
        return response()->download( $contents);
    }

    public function showBlog($id)
    {
        $images = post_images::where('post_id' ,$id )->get();
        $post = post::where('id',$id)->first();
        return view('front.blog',compact('post','images'));
    }
}
