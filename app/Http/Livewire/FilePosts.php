<?php

/**
 *  ライブワイヤ　ファイルアップロード
 *
 *
 */

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class FilePosts extends Component
{
    public $fileName,$created_at,$updated_at,$userName,$filePostId,$projectId;

    public function mount($item,$id,$projectId)
    {
        $this->projectId = $projectId;
        $this->fileName = $item->fileName;
        $this->created_at = $item->created_at;
        $this->updated_at = $item->updated_at;
        $user = User::find($item->updated_by);
        $this->userName = isset($user) ? $user->name : '不明' ;
        $this->filePostId = $id;
    }

    public function render()
    {
        return view('livewire.file-posts');
    }
}
