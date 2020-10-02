@section('content')

@php
  function strtosec($str) {
    list($h, $m, $s) = explode(':', $str);
    return $h * 3600 + $m * 60 + $s;
  }

  function sectostr($val) {
    return sprintf("%d時間%02d分", $val / 3600, ($val % 3600) / 60);
  }
@endphp

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">登録されているシフト一覧</h5>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th>シフト名</th>
              <th>勤務開始時刻</th>
              <th>勤務終了時刻</th>
              <th>勤務時間</th>
              <th>うち休憩時間</th>
              <th>詳細確認</th>
            </tr>
          </thead>
          <tbody>
          @foreach($masterShifts as $item)
            <tr>
              <td>{{ $item->shiftName }}</td>
              <td>
                @php
                  if($item->startHour){
                    $stime = sprintf('%02d',$item->startHour).':'.sprintf('%02d',$item->startMinute);
                    echo $stime;
                  }
                @endphp
              </td>
              <td>
                @php
                  if($item->endHour){
                    $etime = sprintf('%02d',$item->endHour).':'.sprintf('%02d',$item->endMinute);
                    echo $etime;
                  }
                @endphp
              </td>
              <td>
                @php
                  if($item->startHour){
                    echo sectostr(strtosec($etime.':00')-strtosec($stime.':00'));
                  }
                @endphp
              </td>
              <td>
                @php
                  $rest1 = 0;
                  if($item->rest1StartHour){
                    $rest1 = strtosec(sprintf('%02d',$item->rest1EndHour).':'.sprintf('%02d',$item->rest1EndMinute).':00') - strtosec(sprintf('%02d',$item->rest1StartHour).':'.sprintf('%02d',$item->rest1StartMinute).':00');
                  }
                  $rest2 = 0;
                  if($item->rest2StartHour){
                    $rest2 = strtosec(sprintf('%02d',$item->rest2EndHour).':'.sprintf('%02d',$item->rest2EndMinute).':00') - strtosec(sprintf('%02d',$item->rest2StartHour).':'.sprintf('%02d',$item->rest2StartMinute).':00');
                  }
                  $rest3 = 0;
                  if($item->rest3StartHour){
                    $rest3 = strtosec(sprintf('%02d',$item->rest3EndHour).':'.sprintf('%02d',$item->rest3EndMinute).':00') - strtosec(sprintf('%02d',$item->rest3StartHour).':'.sprintf('%02d',$item->rest3StartMinute).':00');
                  }
                  if($rest1>0 || $rest2>0 || $rest3>0){
                    echo sectostr($rest1 + $rest2 + $rest3);
                  }
                @endphp
              </td>
              <td><a href="{{ route('master_shifts.show',$item->shiftId) }}" class="btn btn-success btn-sm">詳細確認</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
