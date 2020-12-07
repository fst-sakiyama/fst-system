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
                                <h5>定例ライブ一覧</h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('live_monitaring_plan.masterCreate') }}">
                                    <button class="btn btn-sm btn-primary py-0">新規作成</button>
                                </a>
                            </div>
                        </div>
                    </div>

                  <table class="table table-sm">
                      <thead>
                          <tr>
                              <th>ライブ名</th>
                              <th>曜日</th>
                              <th>開始時刻</th>
                              <th>祝日の扱い</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($items as $live)
                            @foreach($live->regLiveDetails as $detail)
                                @php $cnt = count($live->regLiveDetails); @endphp
                                @if($loop->first)
                                  <tr>
                                      <td rowspan="{{$cnt}}">{{ $live->liveName }}</td>
                                      <td>{{ $weekday[$detail->weekDay] }}</td>
                                      <td>{{ init_value($detail->startHour,$detail->startMinute) }}</td>
                                      <td rowspan="{{$cnt}}">{{ $forHoliday[$live->forHolidays] }}</td>
                                  </tr>
                                @else
                                    <tr>
                                        <td>{{ $weekday[$detail->weekDay] }}</td>
                                        <td>{{ init_value($detail->startHour,$detail->startMinute) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>

@endsection
