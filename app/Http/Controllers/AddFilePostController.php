<?php

/**
 *  S3にファイルをアップロードする
 *
 *  使用しているのはrestoreとdestroy
 *  restor → add_file_postsテーブルからデータのみ削除。S3にファイルは残ったまま
 *  destroy → add_file_postsテーブルからデータを削除し、S3からもファイルを削除する
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\AddFilePost;
use App\Models\MasterFileClassification;
use Storage;

class AddFilePostController extends Controller
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function restore(Request $request)
    {
      AddFilePost::onlyTrashed()->find($request->id)->restore();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       $item = AddFilePost::onlyTrashed()
                   ->find($id);
       $filename = pathinfo($item->fileURL,PATHINFO_BASENAME);
       Storage::disk('s3')->delete('/takeOver/'.$filename);
       $item->forceDelete();

       return redirect()->back();
     }
}
