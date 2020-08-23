<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }}-【追記】
</div>
<div class="card-body w-100">
  <img class="img-fluid mx-auto d-block" alt='走る猫' src="{{ asset( 'images/runningCat.png' ) }}" width="">
  <div class="card-img-overlay">
    <div class="card-text mt-5">
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
          最終更新日：{{ $d->format('Y.m.d') }}
        </div>
      </div>
      <div class="col mt-3">
        {!! nl2br(e($item->addTakeOverContent)) !!}
      </div>
    </div>
  </div>
</div>

@if(count($item->files)>0)
  <div class="row mb-2">
    <div class="col ml-4" style="position:relative">
      <small>【添付ファイル】<br>
      @foreach($item->files as $file)
        <a href="{{ asset('/file_addShow?id=') }}{{ $file->addFilePostId }}" target="_blank" rel="noopener noreferrer" class="text-info">{{ $file->fileName }}</a><br>
      @endforeach
      </small>
    </div>
  </div>
@endif

@if(count($item->links)>0)
  <div class="row mb-2" style="position:relative;">
    <div class="col ml-4">
      <small>【参考リンク】<br>
      @foreach($item->links as $link)
        <a href="{{ $link->referenceLinkURL }}" target="_blank" rel="noopener noreferrer" class="text-info">@if(empty($link->remarks)){{ $link->referenceLinkURL }}@else {{ $link->remarks }} @endif</a><br>
      @endforeach
      </small>
    </div>
  </div>
@endif

<div class="card-footer" style="position:relative;">
  <div class="row mb-0">
    <div class="col ml-4">
      {{Form::open(['route'=>['add_take_over.destroy',$item->addTakeOverId],'method'=>'DELETE','id'=>'form_'.$item->addTakeOverId])}}
      {{Form::submit('削除',['class' => 'btn btn-danger btn-sm','data-id'=>$item->takeOverId,'onclick'=>"return confirm('本当に削除して良いですか？')"])}}
      {{Form::close()}}
    </div>
    <div class="small text-right">
      ユーザー名【追記】
    </div>
  </div>
</div>
