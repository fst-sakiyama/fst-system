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
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>@include('components.returnButton')</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <h5 class="card-header">登録されているシフト詳細</h5>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-4">
                シフト名
              </div>
              <div class="col-6">
                {{ $item->shiftName }}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                勤務開始時刻
              </div>
              <div class="col-6">
                @php
                  if($item->startHour){
                    $stime = sprintf('%02d',$item->startHour).':'.sprintf('%02d',$item->startMinute);
                    echo $stime;
                  }
                @endphp
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                勤務終了時刻
              </div>
              <div class="col-6">
                @php
                  if($item->endHour){
                    $etime = sprintf('%02d',$item->endHour).':'.sprintf('%02d',$item->endMinute);
                    echo $etime;
                  }
                @endphp
              </div>
            </div>

            @if($item->rest1StartHour)
            <div class="form-group row">
              <div class="col-4">
                休憩１開始時刻
              </div>
              <div class="col-6">
                @php
                  $restTime = sprintf('%02d',$item->rest1StartHour).':'.sprintf('%02d',$item->rest1StartMinute);
                  echo $restTime;
                @endphp
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                休憩１終了時刻
              </div>
              <div class="col-6">
                @php
                  $restTime = sprintf('%02d',$item->rest1EndHour).':'.sprintf('%02d',$item->rest1EndMinute);
                  echo $restTime;
                @endphp
              </div>
            </div>
            @endif

            @if($item->rest2StartHour)
            <div class="form-group row">
              <div class="col-4">
                休憩２開始時刻
              </div>
              <div class="col-6">
                @php
                  $restTime = sprintf('%02d',$item->rest2StartHour).':'.sprintf('%02d',$item->rest2StartMinute);
                  echo $restTime;
                @endphp
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                休憩２終了時刻
              </div>
              <div class="col-6">
                @php
                  $restTime = sprintf('%02d',$item->rest2EndHour).':'.sprintf('%02d',$item->rest2EndMinute);
                  echo $restTime;
                @endphp
              </div>
            </div>
            @endif

            @if($item->rest3StartHour)
            <div class="form-group row">
              <div class="col-4">
                休憩３開始時刻
              </div>
              <div class="col-6">
                @php
                  $restTime = sprintf('%02d',$item->rest3StartHour).':'.sprintf('%02d',$item->rest3StartMinute);
                  echo $restTime;
                @endphp
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                休憩３終了時刻
              </div>
              <div class="col-6">
                @php
                    $restTime = sprintf('%02d',$item->rest3EndHour).':'.sprintf('%02d',$item->rest3EndMinute);
                    echo $restTime;
                @endphp
              </div>
            </div>
            @endif

            <div class="form-group row">
              <div class="col-4">
                勤務時間（休憩時間）
              </div>
              <div class="col-6">
                @php
                  if($item->startHour){
                    echo sectostr(strtosec($etime.':00')-strtosec($stime.':00'));
                  }
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
                    echo '（'.sectostr($rest1 + $rest2 + $rest3).'）';
                  }
                @endphp
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                勤務地
              </div>
              <div class="col-6">
                {{ $item->workLocation }}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                勤務形態
              </div>
              <div class="col-6">
                {{ $item->workStyle }}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-4">
                説明
              </div>
              <div class="col-6">
                {{ $item->description }}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
