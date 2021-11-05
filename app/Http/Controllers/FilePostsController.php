<?php

/**
 *  S3にファイルを保存する
 *
 *  テーブルに登録するのは、ファイル名とS3のURL
 *  S3にはシステムで自動的に振られるファイル名で登録されている
 *  S3上ではファイル名だけではファイルを推測できない、ので、このテーブルが飛ぶと大変です
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\FilePost;
use App\Models\ProjectsFilePost;
use App\Models\ProjectsFileClassification;
use App\Models\MasterFileClassification;
use Storage;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $projectsFileClassifications = ProjectsFileClassification::orderBy('order_of_row')->get();

        $postsSql = DB::table('projects_file_posts')->whereNull('deleted_at')->where('projectId','=',':projectId')->toSql();

        foreach($projectsFileClassifications as $item){
            $id = $item->projectsFileClassificationId;
            $projectsFilePosts[$id][0] = DB::table(DB::raw('('.$postsSql.') AS posts'))
                                      ->rightJoin('projects_file_classifications', 'posts.projectsFileClassificationId', '=', 'projects_file_classifications.projectsFileClassificationId')
                                      ->setBindings([':projectId'=>$request->id])
                                      ->where('projects_file_classifications.projectsFileClassificationId',$id)
                                      ->orderBy('order_of_row')
                                      ->select('projects_file_classifications.*','posts.*')
                                      ->get();
            $projectsFilePosts[$id][1] = ProjectsFilePost::where('projectId',$request->id)->where('projectsFileClassificationId',$id)->count();
            $projectsFilePosts[$id][2] = ProjectsFilePost::where('projectId',$request->id)->where('projectsFileClassificationId',$id)->max('updated_at');
        }

        $teamProjects = TeamProject::where('projectId',$request->id)->get();

        $masterFileClassifications = MasterFileClassification::orderBy('order_of_row')->get();

        $postsSql = DB::table('file_posts')->whereNull('deleted_at')->where('teamProjectId','=',':teamProjectId')->toSql();

        foreach ($teamProjects as $teamProject) {

            $teamProjectId = $teamProject->teamProjectId;

            foreach($masterFileClassifications as $item){
                $id = $item->fileClassificationId;
                $masterFilePosts[$teamProjectId][$id][0] = DB::table(DB::raw('('.$postsSql.') AS posts'))
                                          ->rightJoin('master_file_classifications', 'posts.fileClassificationId', '=', 'master_file_classifications.fileClassificationId')
                                          ->setBindings([':teamProjectId'=>$teamProjectId])
                                          ->where('master_file_classifications.fileClassificationId',$id)
                                          ->orderBy('order_of_row')
                                          ->select('master_file_classifications.*','posts.*')
                                          ->get();
                $masterFilePosts[$teamProjectId][$id][1] = FilePost::where('teamProjectId',$teamProjectId)->where('fileClassificationId',$id)->count();
                $masterFilePosts[$teamProjectId][$id][2] = FilePost::where('teamProjectId',$teamProjectId)->where('fileClassificationId',$id)->max('updated_at');
            }
        }

        return view('file_posts.index',compact('masterFileClassification','projectsFileClassification','masterProject','projectsFileClassifications','projectsFilePosts','masterFileClassifications','masterFilePosts','teamProjects'));
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
        $classId = $request->fileClassificationId;
        $files = $request->file('files');

        DB::beginTransaction();

        try{
            if($request->projectId){
                $id = $request->projectId;
                $folderName = ProjectsFileClassification::find($classId)->folderName;
                for($i=0; $i<count($files); $i++){
                  $file = $files[$i];
                  if($file){
                    $fileName = $file->getClientOriginalName();
                    $path = Storage::disk('s3')->putFile('/'.$folderName, $file, 'public');
                    $fileURL = Storage::disk('s3')->url($path);
                    $projectsFilePost = new ProjectsFilePost;
                    $projectsFilePost->fill([
                        'projectId' => $id,
                        'projectsFileClassificationId' => $classId,
                        'fileName' => $fileName,
                        'fileURL' => $fileURL,
                    ])->save();
                  }
                }
            } elseif($request->teamProjectId){
                $id = $request->teamProjectId;
                $folderName = MasterFileClassification::find($classId)->folderName;
                for($i=0; $i<count($files); $i++){
                  $file = $files[$i];
                  if($file){
                    $fileName = $file->getClientOriginalName();
                    $path = Storage::disk('s3')->putFile('/'.$folderName, $file, 'public');
                    $fileURL = Storage::disk('s3')->url($path);
                    $filePost = new FilePost;
                    $filePost->fill([
                        'teamProjectId' => $id,
                        'fileClassificationId' => $classId,
                        'fileName' => $fileName,
                        'fileURL' => $fileURL,
                    ])->save();
                  }
                }
            } else {
                return redirect()->back()->with('message','※正常に終了しませんでした。')->withInput();
            }

            DB::commit();

          }catch(\Exception $e) {

            DB::rollback();
            dd('エラーが発生しました');

          }

        return redirect()->back();
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

    public function pr_detail(Request $request)
    {
      $item = MasterProject::find($request->id);
      $item->project_detail = $request->project_detail;
      $item->save();
      $item = MasterProject::find($request->id);
      $project_detail = $item->project_detail;

      return response()->json(['project_detail'=>$project_detail]);
    }

    public function detail(Request $request)
    {
      $item = TeamProject::find($request->id);
      $item->project_detail = $request->project_detail;
      $item->save();
      $item = TeamProject::find($request->id);
      $project_detail = $item->project_detail;

      return response()->json(['project_detail'=>$project_detail]);
    }

    public function pr_change(Request $request)
    {
      $item = ProjectsFilePost::find($request->id);
      $item->fileName = $request->fileName;
      $item->save();
      $item = ProjectsFilePost::find($request->id);
      $fileName = $item->fileName;
      $updated_at = $item->updated_at;

      return response()->json(['fileName'=>$fileName,'updated_at'=>$updated_at]);
    }

    public function change(Request $request)
    {
      $item = FilePost::find($request->id);
      $item->fileName = $request->fileName;
      $item->save();
      $item = FilePost::find($request->id);
      $fileName = $item->fileName;
      $updated_at = $item->updated_at;

      return response()->json(['fileName'=>$fileName,'updated_at'=>$updated_at]);
    }

    public function pr_del(Request $request)
    {
      ProjectsFilePost::find($request->id)->delete();

      return response()->json(['url'=>url('/file_posts?id='.$request->projectId)]);
    }

    public function del(Request $request)
    {
      FilePost::find($request->id)->delete();

      return response()->json(['url'=>url('/file_posts?id='.$request->projectId)]);
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
