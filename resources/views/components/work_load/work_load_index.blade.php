@section('content')
@php
  $prevId=null;
@endphp

<div class="contents">
  <div class="container container-top">
    <div class="row">

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
            <th class="shift-table-title text-center">案件名</th>
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
          @foreach($teamProjects as $teamProject)
            @php $nowId = $teamProject->project->clientId; @endphp
              @if(is_null($prevId) || $teamProject->project->clientId !== $prevId)
                <tr>
                  <td>
                    {{ $teamProject->project->client->clientName }}
                  </td>
                </tr>
              @endif
                <tr>
                  <td>
                    {{ $teamProject->project->projectName }}
                  </td>
                  @foreach($dates as $date)
                    @if($date->month == $firstDay->month)
                      <td>
                        @if(isset($workLoads[$date->timestamp][$teamProject->teamProjectId]))
                          {{ $workLoads[$date->timestamp][$teamProject->teamProjectId] }}
                        @endif
                      </td>
                    @endif
                  @endforeach
                </tr>
              @php $prevId = $nowId; @endphp
          @endforeach
        </tbody>
      </table>



    </div>
  </div>
</div>

@endsection
