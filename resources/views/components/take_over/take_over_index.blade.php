@section('content')

@php
  $week = array('日', '月', '火', '水', '木', '金', '土');
  $w = $week[date('w',$dispDate)];
  $dt = Carbon\Carbon::createFromTimestamp($dispDate)->setTime(0,0,0);
  $prevDate = $dt->copy()->subDay();
  $todayDate = Carbon\Carbon::now();
  $nextDate = $dt->copy()->addDay();
@endphp

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row d-flex justify-content-between">
            <a href="{{asset('/take_over?dispDate=')}}{{$prevDate->timestamp}}"><button type="button" class="btn btn-outline-success">{{ $prevDate->format('Y年m月d日').'＜' }}</button></a>
            <a href="{{asset('/take_over?dispDate=')}}{{$todayDate->timestamp}}"><button type="button" class="btn-lg btn-outline-success" title="今日に戻る">{{ $dt->format('Y年m月d日')." ".$w."曜日"}}</button></a>
            <a href="{{asset('/take_over?dispDate=')}}{{$nextDate->timestamp}}"><button type="button" class="btn btn-outline-success">{{ '＞'.$nextDate->format('Y年m月d日') }}</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="takeOver-tab" data-toggle="tab" href="#takeOver" role="tab" aria-controls="takeOver">引継ぎ事項</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wellKnown-tab" data-toggle="tab" href="#wellKnown" role="tab" aria-controls="wellKnown">周知事項</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="takeOverTrash-tab" data-toggle="tab" href="#takeOverTrash" role="tab" aria-controls="takeOverTrash">【済】タスク</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wellKnownTrash-tab" data-toggle="tab" href="#wellKnownTrash" role="tab" aria-controls="wellKnownTrash">【済】周知事項</a>
              </li>
            </ul>
          </div>
          <div class="col d-flex justify-content-end align-self-center mr-5">
            <a href="{{asset('/take_over/create?dispDate=') }}{{ $dispDate }}"><button type="button" class="btn btn-primary">新規登録</button></a>
          </div>
        </div>
        <div class="tab-content" id="myTab-content">
          <div class="tab-pane fade show active" id="takeOver" role="tabpanel" aria-labelledby="takeOver-tab">
            <div class="row mt-2">
              @foreach($takeOvers as $item)
              <div class="col-sm-4">
                <div class="card mt-1">
                  @include('components.take_over.take_over_tab',['item'=>$item,'dt'=>$dt])
                </div>
              </div>
              @endforeach
            </div>
            <div class="row mt-2">
              @foreach($takeOversTimeLimit as $item)
              <div class="col-sm-4">
                <div class="card mt-1">
                  @include('components.take_over.take_over_tab',['item'=>$item,'dt'=>$dt])
                </div>
              </div>
              @endforeach
            </div>
            <div class="row mt-2 mb-2">
              @foreach($takeOversTrashToday as $item)
              <div class="col-sm-4">
                <div class="card mt-1">
                  @include('components.take_over.take_over_tab_trash_today',['item'=>$item])
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-right">
              <small class="text-mute">タブ1枚目</small>
            </div>
          </div>
          <div class="tab-pane fade" id="wellKnown" role="tabpanel" aria-labelledby="wellKnown-tab">
            <div class="row mt-2 mb-2">
              @foreach($wellKnowns as $item)
              <div class="col-sm-4">
                <div class="card mt-1">
                  @include('components.take_over.well_known_tab',['item'=>$item])
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-right">
              <small class="text-mute">タブ2枚目</small>
            </div>
          </div>
          <div class="tab-pane fade" id="takeOverTrash" role="tabpanel" aria-labelledby="takeOverTrash-tab">
            <div class="row mt-2 mb-2">
              <div class="col-sm-4">
                <div class="card mt-1">
                  @include('components.take_over.take_over_trash_tab',['takeOversTrash'=>$takeOversTrash])
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <small class="text-mute">タブ3枚目</small>
            </div>
          </div>
          <div class="tab-pane fade" id="wellKnownTrash" role="tabpanel" aria-labelledby="wellKnownTrash-tab">
            <div class="row mt-1 mb-1">
              <div class="col-sm-4">
                <div class="card">
                  @include('components.take_over.well_known_trash_tab',['wellKnownsTrash'=>$wellKnownsTrash])
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <small class="text-mute">タブ4枚目</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
