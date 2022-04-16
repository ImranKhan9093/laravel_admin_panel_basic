<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $aboutusData=Abouts::all();
        return view('admin.about_us.about_us',compact('aboutusData'));
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
          $validated= $request->validate([
               'title'=>['required','string'],
               'subtitle'=>['required','string'],
               'description'=>['required','string']
           ]);

           Abouts::create($validated);
          return redirect()->route('admin.aboutus.index')->with('success','Data added succesfully');         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Abouts $aboutu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Abouts $aboutu)
    {     $aboutus=$aboutu;
       
        return view('admin.about_us.edit',compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abouts $aboutu)
    {
        $validated= $request->validate([
            'title'=>['required','string'],
            'subtitle'=>['required','string'],
            'description'=>['required','string']
        ]);

        $aboutu->update($validated);
       return redirect()->route('admin.aboutus.index')->with('success','Data updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abouts $aboutu)
    { 
        $aboutu->delete();
        return redirect()->route('admin.aboutus.index')->with('success','Data deleted succesfully');

    }  
}
