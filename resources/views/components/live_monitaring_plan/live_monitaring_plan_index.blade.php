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
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5>定例ライブ予定</h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('live_monitaring_plan.masterShow') }}">
                                    <button class="btn btn-sm btn-primary py-0">マスタ管理</button>
                                </a>
                            </div>
                        </div>
                    </div>

                  <table class="table table-sm">
                      <thead>
                          <tr>
                              <th>ラベル</th>
                              <th>ライブ名</th>
                              <th>開始時刻</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($regLive as $live)
                              <tr>
                                  <td>{{ $live->classification }}</td>
                                  <td>{{ $live->liveShow->regLive->liveName }}</td>
                                  <td>{{ init_value($live->liveShow->startHour,$live->liveShow->startMinute) }}</td>
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
                  <h5>ライブ予定</h5>
              </div>
              <table class="table table-sm table-hover">
                  <thead>
                      <tr>
                          <th>dvr</th>
                          <th>issueNo</th>
                          <th>開催日</th>
                          <th>開始時刻</th>
                          <th>終了時刻</th>
                          <th>ライブ名</th>
                          <th>特記事項</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if($items)
                      @foreach($items as $item)
                      <tr>
                          <td>{{ $item->dvr == 1 ? 'あり' : '' }}</td>
                          <td>{{ $item->issueNo ? $item->issueNo : 'なし'}}</td>
                          <td>{{ $item->eventDay->format('Y-m-d') }}</td>
                          <td>{{ init_value($item->startHour,$item->startMinute) }}</td>
                          <td>{{ init_value($item->endHour,$item->endMinute) }}</td>
                          <td>{{ $item->liveName }}</td>
                          <td>{{ $item->specialNote ? $item->specialNote : '' }}</td>
                      </tr>
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
