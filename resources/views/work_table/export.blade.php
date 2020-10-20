@php
  $userName = App\User::find($userId)->name;
  $prevMonth = $firstDay->copy()->subMonth();
  $nextMonth = $firstDay->copy()->addMonth();

  function init_value($str1,$str2){
    if(isset($str1) && $str1 != "null"){
      return $str1;
    } elseif(isset($str2)){
      return $str2;
    } else {
      return '-';
    }
  }

  function init_class($str1,$str2){
    if(isset($str1) && $str1 != "null"){
      return "";
    } elseif(isset($str2)){
      return "";
    } else {
      return 'disabled';
    }
  }

  function create_time($str1,$str2){
    if($str1 === '-' || $str2 === '-'){
      return '-';
    } else {
      return sprintf('%02d',$str1).':'.sprintf('%02d',$str2);
    }
  }
@endphp


      <table class="table table-bordered table-sm table-hover" style="table-layout:fixed;">
        <thead class="thead-light">
          <tr>
            <th class="text-center" style="width:100px;">勤務日</th>
            <th class="text-center" style="width:60px;">シフト</th>
            <th class="text-center" style="width:80px;">出勤</th>
            <th class="text-center" style="width:80px;">退勤</th>
            <th class="text-center" style="width:120px;">休憩1</th>
            <th class="text-center" style="width:120px;">休憩2</th>
            <th class="text-center" style="width:120px;">休憩3</th>
            <th class="text-center" style="width:60px;">遅刻<br>早退</th>
            <th class="text-center" style="width:160px;">特別自由</th>
            <th class="text-center" style="width:160px;">備考</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dates as $date)
            @if($date->month == $firstDay->month)
            <tr
            @if($holidays[$date->timestamp] || $date->dayOfWeek == 0)
              class="table-danger"
            @elseif($date->dayOfWeek == 6)
              class="table-info"
            @endif
            >

              @php $item = $items[$date->timestamp]; @endphp

              <td class="text-center">
              {{ $date->format('m/d').'('.$calendar->weekday()[$date->dayOfWeek].')' }}
              </td>

              <td class="text-center">{{ $item->shiftName }}</td>

              <td class="text-center">
                {{ create_time(init_value($item->goingWorkHour,$item->startHour),init_value($item->goingWorkMinute,$item->startMinute)) }}
              </td>

              <td class="text-center">
                {{ create_time(init_value($item->leavingWorkHour,$item->endHour),init_value($item->leavingWorkMinute,$item->endMinute)) }}
              </td>

              <td class="text-center">
                @php $val = init_value($item->workTableRest1StartHour,$item->rest1StartHour); @endphp
                @if($val === '-')
                  -
                @else
                  {{ create_time($val,init_value($item->workTableRest1StartMinute,$item->rest1StartMinute)) }}
                  ～
                  {{ create_time(init_value($item->workTableRest1EndHour,$item->rest1EndHour),init_value($item->workTableRest1EndMinute,$item->rest1EndMinute)) }}
                @endif
              </td>

              <td class="text-center">
                @php $val = init_value($item->workTableRest2StartHour,$item->rest2StartHour); @endphp
                @if($val === '-')
                  -
                @else
                  {{ create_time($val,init_value($item->workTableRest2StartMinute,$item->rest2StartMinute)) }}
                  ～
                  {{ create_time(init_value($item->workTableRest2EndHour,$item->rest2EndHour),init_value($item->workTableRest2EndMinute,$item->rest2EndMinute)) }}
                @endif
              </td>

              <td class="text-center">
                @php $val = init_value($item->workTableRest3StartHour,$item->rest3StartHour); @endphp
                @if($val === '-')
                  -
                @else
                  {{ create_time($val,init_value($item->workTableRest3StartMinute,$item->rest3StartMinute)) }}
                  ～
                  {{ create_time(init_value($item->workTableRest3EndHour,$item->rest3EndHour),init_value($item->workTableRest3EndMinute,$item->rest3EndMinute)) }}
                @endif
              </td>

              <td class="text-center">
                @if($item->lateEarlyLeave==1)
                  あり
                @endif
              </td>

              <td>
                @if(isset($item->specialReason))
                  {{ $item->specialReason }}
                @endif
              </td>

              <td>
                @if(isset($item->remarks))
                  {{ $item->remarks }}
                @endif
              </td>

            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
