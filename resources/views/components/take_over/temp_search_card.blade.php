<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->project->projectName,0,12) }}
</div>

<div class="card-body img-brownCatSearch">

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
        最終更新日：{{ $d->format('Y.m.d') }}
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

</div>

<div class="card-footer" style="position:relative;">
  <div class="container-fluid">
    <div class="row mb-0 justify-content-between">

    </div>
  </div>
  <div class="row mb-0 mr-1 float-right">
    <div class="small">
      @empty(!($item->created_by))
        作成者：{{ app\User::find($item->created_by)->name }}
      @endempty
      @empty(!($item->updated_by))
        @if(($item->created_at) != ($item->updated_at))
          <br>更新者：{{ app\User::find($item->updated_by)->name }}
        @endif
      @endempty
    </div>
  </div>
</div>
