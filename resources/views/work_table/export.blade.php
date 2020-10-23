@php
  $userName = App\User::find($userId)->name;
  $prevMonth = $firstDay->copy()->subMonth();
  $nextMonth = $firstDay->copy()->addMonth();

  if(!function_exists('init_value')){
    function init_value($str1,$str2){
      if(isset($str1) && $str1 != "null"){
        return $str1;
      } elseif(isset($str2)){
        return $str2;
      } else {
        return '';
      }
    }
  }
@endphp


<table class="table table-bordered table-sm">
  <thead class="thead-light">
    <tr>
      <th class="text-center">勤務日</th>
      <th class="text-center">曜日</th>
      <th class="text-center">出勤</th>
      <th class="text-center">出勤</th>
      <th class="text-center">退勤</th>
      <th class="text-center">退勤</th>
      <th class="text-center">休憩1</th>
      <th class="text-center">休憩1</th>
      <th class="text-center">休憩1</th>
      <th class="text-center">休憩1</th>
      <th class="text-center">休憩2</th>
      <th class="text-center">休憩2</th>
      <th class="text-center">休憩2</th>
      <th class="text-center">休憩2</th>
      <th class="text-center">休憩3</th>
      <th class="text-center">休憩3</th>
      <th class="text-center">休憩3</th>
      <th class="text-center">休憩3</th>
      <th class="text-center">シフト</th>
      <th class="text-center">遅刻<br>早退</th>
      <th class="text-center">特別事由</th>
      <th class="text-center">備考</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dates as $date)
      @if($date->month == $firstDay->month)
      <tr>

        @php $item = $items[$date->timestamp]; @endphp

        <td class="text-center">
          {{ $date->format('m/d') }}
        </td>

        <td class="text-center">
          {{ $calendar->weekday()[$date->dayOfWeek] }}
        </td>

        <td class="text-center">
          {{ init_value($item->goingWorkHour,$item->startHour) }}
        </td>

        <td class="text-center">
          {{ init_value($item->goingWorkMinute,$item->startMinute) }}
        </td>

        <td class="text-center">
          {{ init_value($item->leavingWorkHour,$item->endHour) }}
        </td>

        <td class="text-center">
          {{ init_value($item->leavingWorkMinute,$item->endMinute) }}
        </td>

        <td class="text-center">
          {{ init_value($item->workTableRest1StartHour,$item->rest1StartHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest1StartMinute,$item->rest1StartMinute) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest1EndHour,$item->rest1EndHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest1EndMinute,$item->rest1EndMinute) }}
        </td>

        <td class="text-center">
          {{ init_value($item->workTableRest2StartHour,$item->rest2StartHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest2StartMinute,$item->rest2StartMinute) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest2EndHour,$item->rest2EndHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest2EndMinute,$item->rest2EndMinute) }}
        </td>

        <td class="text-center">
          {{ init_value($item->workTableRest3StartHour,$item->rest3StartHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest3StartMinute,$item->rest3StartMinute) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest3EndHour,$item->rest3EndHour) }}
        </td>
        <td class="text-center">
          {{ init_value($item->workTableRest3EndMinute,$item->rest3EndMinute) }}
        </td>

        <td class="text-center">{{ $item->shiftName }}</td>

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
