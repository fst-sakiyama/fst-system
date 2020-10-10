@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>シフト表</h1>
    <table class="table table-bordered table-sm shift-table table-hover">
      <!-- 名前列 -->
      <col span="1" style="background-color: #fffacd;">

      @foreach($dates as $date)
        @if($date->month == $firstDay->month)
          @if($holidays[$date->timestamp] || $date->dayOfWeek == 0)
            <!-- 祝日または日曜日 -->
            <col span="1" style="background-color: #ffc0cb;">
          @elseif($date->dayOfWeek == 6)
            <!-- 土曜日 -->
            <col span="1" style="background-color: #e0ffff;">
          @else
            <col span="1">
          @endif
        @endif
      @endforeach

      <thead>
        <tr>
          <th style="display: none;">id</th>
          <th class="shift-table-title text-center">名前</th>
          @foreach($dates as $date)
            @if($date->month == $firstDay->month)
            <th class="text-center">
              {{ $date->day }}<br>
              {{ $calendar->weekday()[$date->dayOfWeek] }}
            </th>
            @endif
          @endforeach
        </tr>
      </thead>
      <tbody>
          @foreach($items as $item)
          <tr>
            @foreach($item as $shift)
              @if($shift === reset($item))
                <td style="display: none;">
                  {{ $shift }}
                </td>
              @elseif($shift)
                <td class="small text-center text-nowrap">
                  {{ $shift }}
                </td>
              @else
                <td class=""></td>
              @endif
              @if($loop->iteration > $firstDay->format('t') + 1)
                @break
              @endif
            @endforeach
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
