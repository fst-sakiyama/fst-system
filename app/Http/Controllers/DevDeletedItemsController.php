<?php

/**
 *  削除されたファイル一覧を表示させる
 *
 *  実際に表示されるのは、file_postsテーブルとadd_file_postsテーブルの論理削除されたデータ
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePost;
use App\Models\AddFilePost;
use Storage;
use File;
use Illuminate\Pagination\LengthAwarePaginator;

class DevDeletedItemsController extends Controller
{
  public function index(Request $request)
  {
    $filePosts = FilePost::onlyTrashed()
                  ->orderBy('deleted_at','desc')
                  ->paginate(20);

    $addFilePosts = AddFilePost::onlyTrashed()
                    ->orderBy('deleted_at','desc')
                    ->paginate(20);

    return view('dev_deleted_items.index',compact('filePosts','addFilePosts'));
  }
}
