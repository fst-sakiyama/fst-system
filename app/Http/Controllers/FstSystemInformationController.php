<?php

namespace App\Http\Controllers;

use App\Models\FstSystemInformation;
use Illuminate\Http\Request;
use Storage;
use File;

class FstSystemInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('top_information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('s3')->putFile('/info', $file, 'public');
        $fstSystemInformation = new FstSystemInformation;
        $fstSystemInformation->classification = $request->classification;
        $fstSystemInformation->information = $request->information;
        $fstSystemInformation->fileName = $fileName;
        $fstSystemInformation->fileURL = Storage::disk('s3')->url($path);
        $fstSystemInformation->save();

        return redirect()->route('top');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FstSystemInformation  $fstSystemInformation
     * @return \Illuminate\Http\Response
     */
    public function show(FstSystemInformation $fstSystemInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FstSystemInformation  $fstSystemInformation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = FstSystemInformation::find($id);

        return view('top_information.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FstSystemInformation  $fstSystemInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FstSystemInformation  $fstSystemInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }
}
