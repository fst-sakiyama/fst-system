<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,15) }}
</div>

<div class="card-body img-wellKnown">

  <div class="row">
    <div class="col card-text">
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
  </div>

  <div class="row mt-3">
    <div class="col card-text">
      {!! nl2br(e($item->takeOverContent)) !!}
    </div>
  </div>

  @if(count($item->files)>0)
  <div class="row mt-4">
    <div class="col card-text">
      <small>【添付ファイル】<br>
      @foreach($item->files as $file)
        <a href="{{ asset('/file_addShow?id=') }}{{ $file->addFilePostId }}" target="_blank" rel="noopener noreferrer" class="text-info" style="position:relative">{{ $file->fileName }}</a><br>
      @endforeach
      </small>
    </div>
  </div>
  @endif

  @if(count($item->links)>0)
  <div class="row mt-4">
    <div class="col card-text">
      <small>【参考リンク】<br>
      @foreach($item->links as $link)
        <a href="{{ $link->referenceLinkURL }}" target="_blank" rel="noopener noreferrer" class="text-info" style="position:relative;">@if(empty($link->remarks)){{ $link->referenceLinkURL }}@else {{ $link->remarks }} @endif</a><br>
      @endforeach
      </small>
    </div>
  </div>
  @endif

  @empty(!($item->takeOverTheOperations()->first()))
  <div class="row mt-2">
    <div class="col card-text" style="position:relative;">
      <small><a id="takeOver_{{$item->takeOverId}}" class="openAddCard text-primary" style="cursor:pointer;">追記を開く...</a></small>
    </div>
  </div>
  @endempty

  <div class="row mt-3 mr-1">
    <div class="col card-text text-right">
      <a href="{{ route('take_over.doEdit',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-warning btn-sm">修正</a>
    </div>
  </div>

</div>

<div class="card-footer" style="position:relative;">
  <div class="container-fluid">
    <div class="row mb-0 justify-content-between">
      <div class="">
        <a href="{{ route('add_take_over.create',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-primary btn-sm">追記</a>
      </div>
      <div class="">
        <a href="{{ route('take_over.rmWellKnown',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-success btn-sm">＜--引き継ぎへ</a>
      </div>
      <div class="">
        {{Form::open(['route'=>['take_over.destroy',$item->takeOverId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
        {{Form::submit('完了',['class' => 'btn btn-danger btn-sm','data-id'=>$item->projectId,'onclick'=>"return confirm('本当に完了にして良いですか？')"])}}
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
