<?php

namespace App\Http\Controllers;

use App\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = section::all();
        return view('backEnd.section.show',compact('sections'));
    }//end of index


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.section.create');
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
            'section_name'=> 'required',
            'section_name_ar'=> 'required',
            
        ]);

        $section = new section;
        $section->section_name = $request->section_name;
        $section->section_name_ar = $request->section_name_ar;
        $section->save();
        return redirect(route('section.index'))->with('success','Section Created successfully');
    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = section::where('id',$id)->first();
        return view('backEnd.section.edit',compact('section'));
    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            'section_name'=> 'required',
            'section_name_ar'=> 'required',
        ]);

        $section = section::find($id);

        $section->section_name = $request->section_name;
        $section->section_name_ar = $request->section_name_ar;
        $section->save();
        return redirect(route('section.index'))->with('success','Section Updated successfully');
    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        section::where('id',$id)->delete();
        return redirect()->back()->with('delete','Section Deleted successfully');
    }//end of desroy
    
}//end of SectionController
