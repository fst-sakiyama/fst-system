<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,12) }}
</div>
<div class="card-body w-100">
  <img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/doComp.png' ) }}" width="">
  <div class="card-img-overlay">
    <div class="card-text mt-5">
      {{ $item->takeOverId }}<br>
      <div class="col">
        <div
        @if(($item->created_at) != ($item->updated_at))
          @php $d = $item->updated_at; @endphp
          class="small text-mute text-right font-weight-bold text-danger"
        @else
          @php $d = $item->created_at; @endphp
          class="small text-mute text-right"
        @endif
        >
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
  <div class="container-fluid">
    <div class="row mb-0 justify-content-between">
      <div class="">
        <a href="{{ route('take_over.restore',['id'=>$item->takeOverId]) }}" class="btn btn-primary btn-sm">戻す</a>
      </div>
      <div class="">
        <a href="{{ route('take_over.doWellKnown',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-success btn-sm">＞周知事項へ＜</a>
      </div>
      <div class="">
        {{Form::open(['route'=>['take_over.destroy',$item->takeOverId],'method'=>'DELETE','id'=>'form_'.$item->takeOverId])}}
        {{Form::submit('完了',['class' => 'btn btn-danger btn-sm','data-id'=>$item->takeOverId,'onclick'=>"return confirm('本当に完了にして良いですか？')"])}}
        {{Form::close()}}
      </div>
    </div>
  </div>
  <div class="row mb-0 mr-1 float-right">
    <div class="small">
      {{ $item->project->client->clientName }}
    </div>
  </div>
</div>
