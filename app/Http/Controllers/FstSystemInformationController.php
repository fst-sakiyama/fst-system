<?php

/**
 *  トップページのお知らせにファイルをアップロードする（開発者のみ）
 *
 *
 */

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
        $item = FstSystemInformation::find($id);

        $item->classification = $request->classification;
        $item->information = $request->information;

        $file = $request->file('file');

        if(isset($file)){
          $fileName = $file->getClientOriginalName();
          $path = Storage::disk('s3')->putFile('/info', $file, 'public');
          $item->fileName = $fileName;
          $item->fileURL = Storage::disk('s3')->url($path);
        } else {
          $item->fileName = null;
          $item->fileURL = null;
        }

        $item->save();

        return redirect()->route('top');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FstSystemInformation  $fstSystemInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = FstSystemInformation::find($id);
        $filename = pathinfo($item->fileUrl,PATHINFO_BASENAME);
        Storage::disk('s3')->delete('/info/'.$filename);

        $item->delete();

        return redirect()->route('top');
    }
}
