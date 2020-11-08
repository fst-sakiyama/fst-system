<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\FilePost;
use App\Models\ProjectsFileClassification;
use App\Models\MasterFileClassification;
use Storage;

class FilePostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $masterFileClassification = MasterFileClassification::select('fileClassificationId','fileClassification')
                  ->orderBy('order_of_row')
                  ->get()
                  ->pluck('fileClassification','fileClassificationId');

        $projectsFileClassification = ProjectsFileClassification::select('projectsFileClassificationId','fileClassification')
                  ->orderBy('order_of_row')
                  ->get()
                  ->pluck('fileClassification','projectsFileClassificationId');

        $masterProject = MasterProject::find($request->id);

        $teamProjects = TeamProject::where('projectId',$request->id)->get();

        foreach($teamProjects as $teamProject){
          $id = $teamProject->teamProjectId;
          $items[$id] = FilePost::where('teamProjectId',$id);
        }

        return view('file_posts.index',compact('masterFileClassification','projectsFileClassification','masterProject','teamProjects','items'));
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
        dd($request);
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
      FilePost::onlyTrashed()->find($request->id)->restore();

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
      $item = FilePost::onlyTrashed()
                  ->find($id);
      $filename = pathinfo($item->fileURL,PATHINFO_BASENAME);
      $folderName = MasterFileClassification::where('fileClassificationId',$item->fileClassificationId)
                      ->first();
      Storage::disk('s3')->delete('/'.$folderName->folderName.'/'.$filename);
      $item->forceDelete();

      return redirect()->back();
    }
}
