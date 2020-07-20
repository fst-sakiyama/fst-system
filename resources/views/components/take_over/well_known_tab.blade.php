<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,15) }}
</div>
<div class="card-body w-100">
  <img class="img-fluid mx-auto d-block" alt='周知事項' src="{{ asset( 'images/wellKnown.png' ) }}" width="">
  <div class="card-img-overlay">
    <div class="card-text mt-5">
      {{ $item->takeOverId }}<br>
      @php
        if(($item->created_at) != ($item->updated_at)){
          $d = $item->updated_at;
        } else {
          $d = $item->created_at;
        }
      @endphp
      <div class="col">
        <div class="mt-3 small text-mute text-right">
          最終更新日：{{ date('Y.m.d',strtotime($d)) }}
        </div>
      </div>
      <div class="col mt-3">
        {!! nl2br(e($item->takeOverContent)) !!}
      </div>
    </div>
  </div>
</div>
<div class="card-footer" style="position:relative;">
  <div class="row mb-0">
    <div class="ml-3">
      <a href="{{ route('progress_detail.editDoComp',['id'=>$item->projectId,'takeOverId'=>$item->takeOverId]) }}" class="btn btn-primary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
    </div>
    <div class="mr-2 ml-auto">
      <a href="{{ route('take_over.doEdit',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-success btn-sm">修正</a>
    </div>
    <div class="mr-3">
      {{Form::open(['route'=>['progress_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
      {{Form::submit('削除',['class' => 'btn btn-danger btn-sm deleteConf','data-id'=>$item->projectId])}}
      {{Form::close()}}
    </div>
  </div>
  <div class="row mb-0 mr-1 float-right">
    <div class="small">
      {{ $item->project->client->clientName }}
    </div>
  </div>
</div>
