@section('content')
@php
    $userName = App\User::find($userId)->name;
    $prevMonth = $firstDay->copy()->subMonth();
    $nextMonth = $firstDay->copy()->addMonth();
    $prevId=null;
    $i=0;
@endphp

<div class="contents">
  <div class="container container-top">
    <div class="row">
        <div class="col text-left">
          <a href="{{ route('work_load.index',['year'=>$prevMonth->format('Y'),'month'=>$prevMonth->format('m'),'uid'=>$userId])}}">
            <i class="fa fa-lg fa-chevron-circle-left" style="color:#65ab31;"><small>{{ $prevMonth->format('Y年m月') }}</small></i>
          </a>
        </div>
        <div class="col text-center">
          <a href="{{ route('work_load.index',['uid'=>$userId]) }}">
            <i class="fa fa-lg fa-angle-left" style="color:#65ab31;"><small>当月へ</small></i><i class="fa fa-lg fa-angle-right" style="color:#65ab31;"></i>
          </a>
        </div>
        <div class="col text-right">
          <a href="{{ route('work_load.index',['year'=>$nextMonth->format('Y'),'month'=>$nextMonth->format('m'),'uid'=>$userId])}}">
            <i class="fa fa-lg fa-chevron-circle-right" style="color:#65ab31;"><small>{{ $nextMonth->format('Y年m月') }}</small></i>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 mt-3 ml-5 align-self-center">
          <div class="h3">{{ $firstDay->format('Y年m月') }}工数表　{{ $userName }}</div>
        </div>
      </div>

      @if($status)
        <div class="mt-5 alert alert-danger text-center" role="alert">
          {!! nl2br(e($status)) !!}
        </div>
      @else

          <table class="table table-bordered table-sm table-hover" style="table-layout:fixed;">
            <!-- 案件名 -->
            <col span="1" style="background: #fffacd;">
            <col span="1" style="background: #fffacd;">

            @foreach($dates as $date)
              @if($date->month == $firstDay->month)
                @if($holidays[$date->timestamp] || $date->dayOfWeek == 0)
                  <!-- 祝日または日曜日 -->
                  <col span="1" class="sun">
                @elseif($date->dayOfWeek == 6)
                  <!-- 土曜日 -->
                  <col span="1" class="sat">
                @else
                  <col span="1">
                @endif
                @php $i++; @endphp
              @endif
            @endforeach

            <thead>
              <tr class="">
                <th class="text-center fixed01" width="300">案件名</th>
                <th class="text-center fixed01" width="70">
                    工数計<br>
                    {{ Form::text('txt-total',null,['class'=>'form-control form-control-sm my-0 total-text text-right','id'=>'total','disabled']) }}
                </th>
                @foreach($dates as $date)
                  @if($date->month == $firstDay->month)
                      @if($holidays[$date->timestamp] || $date->dayOfWeek == 0)
                        <!-- 祝日または日曜日 -->
                        <th class="sun fixed01 text-center" width="35">
                            {{ $date->day }}<br>
                            {{ $calendar->weekday()[$date->dayOfWeek] }}
                        </th>
                      @elseif($date->dayOfWeek == 6)
                        <!-- 土曜日 -->
                        <th class="sat fixed01 text-center" width="35">
                            {{ $date->day }}<br>
                            {{ $calendar->weekday()[$date->dayOfWeek] }}
                        </th>
                      @else
                        <th class="fixed01 text-center" width="35">
                            {{ $date->day }}<br>
                            {{ $calendar->weekday()[$date->dayOfWeek] }}
                        </th>
                      @endif
                      @php $i++; @endphp
                  @endif
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($teamProjects as $teamProject)
                @php $nowId = $teamProject->project->clientId; $id=$teamProject->teamProjectId; @endphp
                  @if(is_null($prevId) || $teamProject->project->clientId !== $prevId)
                    <tr class="midashi">
                        <th class="font-large table-dark">
                            {{ $teamProject->project->client->clientName }}
                        </th>
                        <th class="table-dark">
                            {{ Form::text('txt-totalWorkLoad',null,['class'=>'form-control form-control-sm my-0 total-text text-right total','id'=>'totalWorkLoad'.$nowId,'disabled']) }}
                        </th>
                        <th class="table-dark" colspan="{{$i}}"></th>
                    </tr>
                  @endif
                    <tr>
                        <th class="font-small">
                            {{ $teamProject->project->projectName }}
                        </th>
                        <th class="text-center">
                            {{ Form::text('txt-subtotalWorkLoad',null,['class'=>'form-control form-control-sm my-0 subtotal-text text-right totalWorkLoad'.$nowId,'id'=>'subtotalWorkLoad'.$id,'disabled'])}}
                        </th>
                      @foreach($dates as $date)
                        @if($date->month == $firstDay->month)
                                @php $t=$date->timestamp; @endphp
                                @if(isset($workLoads[$t][$id][1]))
                                <td class="text-right">
                                    <div class="content">
                                        <a class="js-modal-open" href="" data-t="{{$t}}" data-id="{{$id}}">
                                        @if(isset($workLoads[$t][$id][0]))
                                            <span class="subtotalWorkLoad{{$id}}">{{ $workLoads[$t][$id][0] }}</span>
                                        @endif
                                        </a>
                                    </div>
                                    <div class="modal js-modal{{$t.$id}}">
                                        <div class="modal__bg js-modal-close" data-t="{{$t}}" data-id="{{$id}}"></div>
                                        <div class="modal__content">
                                            <p class="text-center">{!! nl2br(e($workLoads[$t][$id][1])) !!}</p>
                                            <a class="js-modal-close text-center" href="" data-t="{{$t}}" data-id="{{$id}}">閉じる</a>
                                        </div><!--modal__inner-->
                                    </div><!--modal-->
                                </td>
                                @else
                                    <td class="text-right">
                                        @if(isset($workLoads[$t][$id][0]))
                                            <span class="subtotalWorkLoad{{$id}}">{{ $workLoads[$t][$id][0] }}<span>
                                        @endif
                                    </td>
                                @endif

                        @endif
                      @endforeach
                    </tr>
                  @php $prevId = $nowId; @endphp
              @endforeach
            </tbody>
          </table>
        @endif

    </div>
  </div>
</div>

@endsection
