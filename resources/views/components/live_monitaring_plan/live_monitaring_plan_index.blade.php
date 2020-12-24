@section('content')

@php
    function init_value($str1,$str2){
        if(isset($str1)){
            return create_time($str1,$str2);
        } else {
            return '-';
        }
    }

    function create_time($str1,$str2){
        if($str1 === '-' || $str2 === '-'){
            return '-';
        } else {
            return sprintf('%02d',$str1).':'.sprintf('%02d',$str2);
        }
    }

    $weekday = array('日', '月', '火', '水', '木', '金', '土');
    $forHoliday = array('','実施する','中止する','翌平日に実施');
    $regLivePng = array('','live_regular.png','live_transfer.png','live_temporary.png');
    $livePng = array('live_normal.png','live_DVR.png')
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5>定例ライブ予定（7日後まで）</h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('live_monitaring_plan.regLiveCreate') }}">
                                    <button class="btn btn-sm btn-danger py-0">定例臨時登録</button>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('live_monitaring_plan.masterShow') }}">
                                    <button class="btn btn-sm btn-primary py-0">マスタ管理</button>
                                </a>
                            </div>
                        </div>
                    </div>

                  <table class="table table-sm table-hover">
                      <thead>
                          <tr>
                              <th>ラベル</th>
                              <th>ライブ名</th>
                              <th>開催日</th>
                              <th>開始時刻</th>
                              <th>実施可否</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($regLive as $live)
                              <tr id="line{{$live->regLivePlanId}}" class="{{ ($live->exe) ? '' : 'decoLine' }}">
                                  <td>
                                      <span id='imgLabel{{$live->regLivePlanId}}' class='{{$live->exe ? '' : 'd-none'}}'>
                                          <img alt='ラベル' src="{{ asset( 'images/'.$regLivePng[$live->classification] ) }}" width="80px">
                                      </span>
                                      <span id='imgStop{{$live->regLivePlanId}}' class='{{$live->exe ? 'd-none' : ''}}'>
                                          <img alt='ラベル' src="{{ asset( 'images/stop.png' ) }}" width="80px">
                                      </span>
                                  </td>
                                  <td>{{ $live->liveShow->regLive->liveName }}</td>
                                  <td>{{ $live->eventDay->format('Y年m月d日').'（'.$weekday[$live->eventDay->dayOfWeek].'）'}}</td>
                                  <td>{{ init_value($live->liveShow->startHour,$live->liveShow->startMinute) }}</td>
                                  <td>
                                      <button id='stop{{$live->regLivePlanId}}' class='btn btn-outline-danger btn-sm py-0 {{$live->exe ? '' : 'd-none'}}'>中止</button>
                                      <button id='open{{$live->regLivePlanId}}' class='btn btn-outline-success btn-sm py-0 {{$live->exe ? 'd-none' : ''}}'>再開</button>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>


    <div class="row">
        <div class="col">
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-6">
                          <h5>ライブ予定</h5>
                      </div>
                      <div class="col-2">
                          <a href="{{ route('live_monitaring_plan.liveCreate') }}">
                              <button class="btn btn-sm btn-danger py-0">ライブ登録</button>
                          </a>
                      </div>
                  </div>
              </div>

              @php $prevD=null; @endphp

              <table class="table table-sm table-hover">
                  <thead>
                      <tr>
                          <th style="width:10%;">dvr</th>
                          <th style="width:8%;">No</th>
                          <th style="width:8%;">開始</th>
                          <th style="width:8%;">終了</th>
                          <th style="width:26%;">ライブ名</th>
                          <th style="width:40%;">特記事項</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if($items)
                          @foreach($items as $item)
                              @php $nowD = $item->eventDay; @endphp
                              @if(is_null($prevD) || $item->eventDay != $prevD)
                                  <tr>
                                      <td colspan="6" class="table-dark h5">
                                          {{ $item->eventDay->format('Y-m-d').'（'.$weekday[$item->eventDay->dayOfWeek].'）' }}
                                      </td>
                                  </tr>
                              @endif
                                  <tr>
                                      <td><img alt='ラベル' src="{{ asset( 'images/'.$livePng[$item->dvr] ) }}" width="60px"></td>
                                      <td>{{ $item->issueNo ? $item->issueNo : 'なし'}}</td>
                                      <td>{{ init_value($item->startHour,$item->startMinute) }}</td>
                                      <td>{{ init_value($item->endHour,$item->endMinute) }}</td>
                                      <td>{{ $item->liveName }}</td>
                                      <td>@if($item->specialNote){!! nl2br(e($item->specialNote)) !!}@endif</td>
                                  </tr>
                              @php $prevD = $nowD; @endphp
                          @endforeach
                      @endif
                  </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
