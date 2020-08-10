<div class="card-header">
  {{ $item->created_at->format('Y.m.d') }} - {{ mb_substr($item->project->projectName,0,12) }}
</div>
<div class="card-body">
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
      @empty(!($item->timeLimit))
      <div class="col mt-2">
        <span
        @php $dt_tl = new Carbon\Carbon($item->timeLimit); @endphp
        @if($dt->eq($dt_tl))
        class="mark font-weight-bold text-danger h5"
        @elseif($dt->gt($dt_tl))
        class="mark font-weight-bold text-danger h4"
        @else
        class="mark font-weight-bold text-danger"
        @endif
        >
        期限：{{ $item->timeLimit->format('Y.m.d') }}</span>
      </div>
      @endempty
      <div class="col mt-3">
        {!! nl2br(e($item->takeOverContent)) !!}
      </div>
    </div>
  </div>
</div>
<div class="row mb-2" style="position:relative;">
  @empty(!($item->takeOverTheOperations()->first()))
    <div class="col ml-4" style="position:relative;">
      <small class="text-primary"><a id="takeOver_{{$item->takeOverId}}" class="openAddCard" style="cursor:pointer;">追記を開く...</a></small>
    </div>
  @endempty
  <div class="col text-right mr-3">
    <a href="{{ route('take_over.doEdit',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-warning btn-sm">修正</a>
  </div>
</div>
<div class="card-footer" style="position:relative;">
  <div class="container-fluid">
    <div class="row mb-0 justify-content-between">
      <div class="">
        <a href="{{ route('add_take_over.create',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-primary btn-sm">追記</a>
      </div>
      <div class="">
        <a href="{{ route('take_over.doWellKnown',['id'=>$item->takeOverId,'dispDate'=>$dispDate]) }}" class="btn btn-success btn-sm">周知事項へ--＞</a>
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
