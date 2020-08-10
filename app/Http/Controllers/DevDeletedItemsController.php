<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePost;
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

    return view('dev_deleted_items.index',compact('filePosts'));
  }
}
