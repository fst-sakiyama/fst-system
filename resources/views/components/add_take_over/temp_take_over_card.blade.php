<div class="col-sm-4">
  <div class="card mt-1">
    <div class="card-header">
      {{ $takeOverTheOperation->created_at->format('Y.m.d') }} - {{ mb_substr($takeOverTheOperation->project->projectName,0,12) }}
    </div>
    <div class="card-body w-100">
      <img class="img-fluid mx-auto d-block" alt='猫' src="{{ asset( 'images/brownCat.png' ) }}" width="">
      <div class="card-img-overlay">
        <div class="card-text mt-5">
          <div class="col">
            <div
            @if(($takeOverTheOperation->created_at) != ($takeOverTheOperation->updated_at))
              @php $d = $takeOverTheOperation->updated_at; @endphp
              class="small text-mute text-right font-weight-bold text-danger"
            @else
              @php $d = $takeOverTheOperation->created_at; @endphp
              class="small text-mute text-right"
            @endif
            >
              最終更新日：{{ $d->format('Y.m.d') }}
            </div>
          </div>
          <div class="col mt-3">
            {!! nl2br(e($takeOverTheOperation->takeOverContent)) !!}
          </div>
        </div>
      </div>
    </div>

    @if(count($takeOverTheOperation->files)>0)
      <div class="row mb-2">
        <div class="col ml-4" style="position:relative">
          <small>【添付ファイル】<br>
          @foreach($takeOverTheOperation->files as $file)
            <a href="{{ asset('/file_addShow?id=') }}{{ $file->addFilePostId }}" target="_blank" rel="noopener noreferrer" class="text-info">{{ $file->fileName }}</a><br>
          @endforeach
          </small>
        </div>
      </div>
    @endif

    @if(count($takeOverTheOperation->links)>0)
      <div class="row mb-2" style="position:relative;">
        <div class="col ml-4">
          <small>【参考リンク】<br>
          @foreach($takeOverTheOperation->links as $link)
            <a href="{{ $link->referenceLinkURL }}" target="_blank" rel="noopener noreferrer" class="text-info">@if(empty($link->remarks)){{ $link->referenceLinkURL }}@else {{ $link->remarks }} @endif</a><br>
          @endforeach
          </small>
        </div>
      </div>
    @endif

    <div class="card-footer" style="position:relative;">
      <div class="row mb-0 mr-1 float-right">
        <div class="small">
          {{ $takeOverTheOperation->project->client->clientName }}
        </div>
      </div>
    </div>

  </div>
</div>
