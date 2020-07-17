<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,15) }}
</div>
<div class="card-body w-100">
  <img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/doComp.png' ) }}" width="">
  <div class="card-img-overlay">
    <h6 class="card-title mt-5">
      完了時刻：{{ $item->doComp->format('Y年m月d日 H時i分') }}
    </h6>
    <p class="card-text">
      {!! nl2br(e($item->takeOverContent)) !!}
    </p>
    <div class="row">
      <div class="ml-2">
        <a href="{{ route('progress_detail.editDoComp',['id'=>$item->projectId,'takeOverId'=>$item->takeOverId]) }}" class="btn btn-primary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
      </div>
      <div class="mr-2 ml-auto">
        <a href="{{ route('progress_detail.edit',$item->projectId) }}" class="btn btn-success btn-sm">修正</a>
      </div>
      <div class="mr-2">
        {{Form::open(['route'=>['progress_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
        {{Form::submit('削除',['class' => 'btn btn-danger btn-sm deleteConf','data-id'=>$item->projectId])}}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>
