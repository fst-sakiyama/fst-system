<div class="row mt-1 mb-1">
  @foreach($items as $item)
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0.10) }}_{{ mb_substr($item->project->client->clientName,0,5) }}
        </div>
        @empty($item->doComp)
          <div class="card-body w-100">
            <img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/brownCat.png' ) }}" width="">
            <div class="card-img-overlay">
              <div class="card-text mt-5">
                @empty(!($item->timeLimit))
                  <span class="mark font-weight-bold text-danger">期限：{{ date('Y.m.d',strtotime($item->timeLimit)) }}</span><br>
                @endempty
                <div class="mt-3">
                  {!! nl2br(e($item->takeOverContent)) !!}
                </div>
                @if(($item->created_at) != ($item->updated_at))
                  <div class="mt-3 small text-mute text-right">
                    最終更新日：{{ date('Y.m.d',strtotime($item->updated_at)) }}
                  </div>
                @endif
              </div>
              <div class="row mt-3">
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
        @else
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
        @endempty
      </div>
    </div>
  @endforeach
</div>
<div class="card-footer text-right">
  <small class="text-mute">タブ1枚目</small>
</div>
