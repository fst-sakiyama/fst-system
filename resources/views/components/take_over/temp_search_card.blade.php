<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,12) }}
</div>
<div class="card-body w-100">
  <img class="img-fluid mx-auto d-block" alt='猫' src="{{ asset( 'images/brownCat.png' ) }}" width="">
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
        {!! nl2br(e($item->takeOverContent)) !!}
      </div>
    </div>
  </div>
</div>
<div class="card-footer" style="position:relative;">
  <div class="container-fluid">
    <div class="row mb-0 justify-content-between">

    </div>
  </div>
  <div class="row mb-0 mr-1 float-right">
    <div class="small">
      {{ $item->project->client->clientName }}
    </div>
  </div>
</div>
