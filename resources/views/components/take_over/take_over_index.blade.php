@section('content')

@php
  $week = array('日', '月', '火', '水', '木', '金', '土');
  if(empty($dispDate)){
    $dispDate = date('Y年m月d日');
    $w = $week[date('w')];
  }else{
    $dispDate = date('Y年m月d日',strtotime($dispDate));
    $w = $week[date('w',strtotime($dispDate))];
  }
  $prevDate = strtotime('-1 day'.strtotime($dispDate));
  $nextDate = strtotime('+1 day'.strtotime($dispDate));
@endphp

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row d-flex justify-content-between">
            <a href=""><button type="button" class="btn btn-outline-success">{{ date('Y年m月d日',$prevDate).'＜' }}</button></a>
            <h3 class="text-center">{{ $dispDate." ".$w."曜日"}}</h3>
            <a href=""><button type="button" class="btn btn-outline-success">{{ '＞'.date('Y年m月d日',$nextDate) }}</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="takeOver-tab" data-toggle="tab" href="#takeOver" role="tab" aria-controls="takeOver">引継ぎ事項</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wellKnown-tab" data-toggle="tab" href="#wellKnown" role="tab" aria-controls="wellKnown">周知事項</a>
              </li>
            </ul>
          </div>
          <div class="col d-flex justify-content-end align-self-center mr-5">
            <a href="{{asset('/take_over/create') }}"><button type="button" class="btn btn-primary">新規登録</button></a>
          </div>
        </div>
        <div class="tab-content" id="myTab-content">
          <div class="tab-pane fade show active" id="takeOver" role="tabpanel" aria-labelledby="takeOver-tab">
            @include('components.take_over.take_over_tab',['items'=>$items])
          </div>
          <div class="tab-pane fade" id="wellKnown" role="tabpanel" aria-labelledby="wellKnown-tab">
            2枚目のタブ<br>
            2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ<br>
            <div class="card-footer text-right">
              <small class="text-mute">タブ2枚目</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
