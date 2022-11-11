<?php

namespace App\Http\Controllers;

use App\company;
use App\section;
use App\img;
use App\file;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::all();
        return view('backEnd.companies.show',compact('companies'));
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = section::all();
        return view('backEnd.companies.create',compact('sections'));
    }//end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        //dd($request);
        $company = new company;

        if($request->hasFile('background_image')){
                
            $file = $request->file('background_image');
            // Get Original filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Filename to store without spaces
            $fileNameToStore = str_replace(' ', '', $filenameWithExt);
            // Upload file
            // to store in public
            //public path
            $company_path = str_replace(' ', '',$request->company_name_english);
            $path = $file->move('attachments/'.$company_path .'/backGroundImg', $fileNameToStore);
            $company->background_image = $path;
        }

        if($request->hasFile('logo')){
                
            $file = $request->file('logo');
            // Get Original filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Filename to store without spaces
            $fileNameToStore = str_replace(' ', '', $filenameWithExt);
            // Upload file
            // to store in public
            //publickpath
            $company_path = str_replace(' ', '',$request->company_name_english);
            $path = $file->move('attachments/'.$company_path .'/logo', $fileNameToStore);
            $company->logo = $path;
        }
        
        $company->company_name_arabic = $request->company_name_arabic;
        $company->company_name_english = $request->company_name_english;
        $company->company_name_kurdish = $request->company_name_kurdish;
        $company->section_id = $request->section;
        $company->bio_arabic = $request->bio_arabic;
        $company->bio_english = $request->bio_english;
        $company->bio_kurdish = $request->bio_kurdish;
        $company->phone = $request->phone;
        $company->whatsapp_num = $request->whatsapp_num;
        $company->address_arabic = $request->address_arabic;
        $company->address_english = $request->address_english;
        $company->address_kurdish = $request->address_kurdish;
        $company->email = $request->email;
        $company->web_site = $request->web_site;
        $company->location = $request->location;
        $company->facebook_link = $request->facebook_link;
        $company->instagram_link = $request->instagram_link;
        $company->linkedin_link = $request->linkedin_link;
        $company->youtube_link = $request->youtube_link;
        $company->linkedin_link = $request->linkedin_link;
        $company->video_link = $request->video_link;
        $company->save();

        $catalogs = $request->file('company_files');
        if($request->hasFile('company_files')){
            
            $company_id = company::latest()->first()->id;
            $company_name = company::latest()->first()->company_name_english;
            foreach ($catalogs as $catalog) {
                $catalogFile = new file;

                // Get Original filename with the extension
                $filenameWithExt = $catalog->getClientOriginalName();
                // Filename to store without spaces
                $fileNameToStore = str_replace(' ', '', $filenameWithExt);
    
    
                // Upload file
                // to store in public
                //publickpath
                $company_path = str_replace(' ', '',$company->company_name_english);
                $path = $catalog->move('attachments/'.$company_path .'/catalogs', $fileNameToStore);
    
                $catalogFile->company_id = $company_id;
                $catalogFile->file = $fileNameToStore;
                $catalogFile->company_name = $company_name;
                $catalogFile->save();
            }
        }
        

        if($request->hasFile('imgs')){
                $files = $request->file('imgs');
               $company_id = company::latest()->first()->id;
               $company_name = company::latest()->first()->company_name_english;
            
                foreach ($files as $file) {
                    // Get Original filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Filename to store without spaces
                    $fileNameToStore = str_replace(' ', '', $filenameWithExt);


                    // Upload file
                    // to store in public
                    //publickpath
                    $company_path = str_replace(' ', '',$company->company_name_english);
                    $path = $file->move('attachments/'.$company_path.'/gallery/', $fileNameToStore);
                    $images = new img;

                    $images->company_id = $company_id;
                    $images->company_name = $company_name;
                    $images->path = $path;
                    $images->save();
                }
            }

        return redirect(route('company.index'))->with('success','Company Created successfully');
    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = img::where('company_id' ,$id )->get();
        $sections = section::all();
        $company = company::where('id',$id)->first();
        
        $company_path = str_replace(' ', '',$company->company_name_english);
        return view('backEnd.companies.edit',compact('company','sections','company_path','images'));
    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $company = company::where('id',$id)->first();
        $company_path = str_replace(' ', '',$company->company_name_english);
        if($request->hasFile('background_image')){
                
            $file = $request->file('background_image');
            // Get Original filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Filename to store without spaces
            $fileNameToStore = str_replace(' ', '', $filenameWithExt);


            // Upload file
            // to store in public
            //publickpath
            
            $path = $file->move('attachments/'.$company_path .'/backGroundImg', $fileNameToStore);
            $company->background_image = $path;
        }

        if($request->hasFile('logo')){
                
            $file = $request->file('logo');
           // Get Original filename with the extension
           $filenameWithExt = $file->getClientOriginalName();
           // Filename to store without spaces
           $fileNameToStore = str_replace(' ', '', $filenameWithExt);
            // Upload file
            // to store in public
            //publickpath
            $path = $file->move('attachments/'.$company_path .'/logo', $fileNameToStore);
            $company->logo = $path;
        }
        
        $company->company_name_arabic = $request->company_name_arabic;
        $company->company_name_english = $request->company_name_english;
        $company->company_name_kurdish = $request->company_name_kurdish;
        $company->section_id = $request->section;
        $company->bio_arabic = $request->bio_arabic;
        $company->bio_english = $request->bio_english;
        $company->bio_kurdish = $request->bio_kurdish;
        $company->phone = $request->phone;
        $company->whatsapp_num = $request->whatsapp_num;
        $company->address_arabic = $request->address_arabic;
        $company->address_english = $request->address_english;
        $company->address_kurdish = $request->address_kurdish;
        $company->email = $request->email;
        $company->web_site = $request->web_site;
        $company->location = $request->location;
        $company->facebook_link = $request->facebook_link;
        $company->instagram_link = $request->instagram_link;
        $company->linkedin_link = $request->linkedin_link;
        $company->youtube_link = $request->youtube_link;
        $company->linkedin_link = $request->linkedin_link;
        $company->video_link = $request->video_link;
        $company->save();

        $catalogs = $request->file('company_files');
        if($request->hasFile('company_files')){
            $company_id = company::where('id',$id)->first()->id;
            $company_name = company::where('id',$id)->first()->company_name_english;
            foreach ($catalogs as $catalog) {

                $catalogFile = new file;
                // Get Original filename with the extension
                $filenameWithExt = $catalog->getClientOriginalName();
                // Filename to store without spaces
                $fileNameToStore = str_replace(' ', '', $filenameWithExt);
                // Upload file
                // to store in public
                //publickpath
                $path = $catalog->move('attachments/'.$company_path .'/catalogs', $fileNameToStore);
    
                $catalogFile->company_id = $company_id;
                $catalogFile->file = $fileNameToStore;
                $catalogFile->company_name = $company_name;
                $catalogFile->save();
            }
        }
        $files = $request->file('imgs');

        if($request->hasFile('imgs'))
            {
                $company_id = company::where('id',$id)->first()->id;
                $company_name = company::where('id',$id)->first()->company_name_english;
                foreach ($files as $file) {
                    // Get Original filename with the extension
                    $filenameWithExt = $file->getClientOriginalName();
                    // Filename to store without spaces
                    $fileNameToStore = str_replace(' ', '', $filenameWithExt);


                    // Upload file
                    // to store in public
                    //publickpath
                    $path = $file->move('attachments/'.$company_path.'/gallery', $fileNameToStore);
                    img::create([
                        'company_id'=>$company_id,
                        'company_name' => $company_name,
                        'path'=> $path,
                    ]);            
                }
            }
        return redirect(route('company.index'))->with('success','Company Updated successfully');
    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::where('id',$id)->first();
        $company_path = str_replace(' ', '',$company->company_name_english);
        $file = file::where('company_id',$id)->first();
        $imgs = img::where('company_id',$id)->first();

        if (!empty($file->company_name)) {
            Storage::disk('public_uploads')->deleteDirectory($company_path);
        }
        if (!empty($imgs->company_name)) {
            Storage::disk('public_uploads')->deleteDirectory($company_path);
        }

        $company->forceDelete();
        return redirect()->back()->with('delete','Company Deleted successfully');
    }//end of desroy
}
