@section('content')

@php
  $prevMonth = $firstDay->copy()->subMonth();
  $nextMonth = $firstDay->copy()->addMonth();
  $str='';
@endphp

<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col text-left">
        <a href="{{ route('shift_table.index',['year'=>$prevMonth->format('Y'),'month'=>$prevMonth->format('m')])}}">
          <i class="fa fa-lg fa-chevron-circle-left" style="color:#65ab31;"><small>{{ $prevMonth->format('Y年m月') }}</small></i>
        </a>
      </div>
      <div class="col text-center">
        <a href="{{ route('shift_table.index') }}">
          <i class="fa fa-lg fa-angle-left" style="color:#65ab31;"><small>当月へ</small></i><i class="fa fa-lg fa-angle-right" style="color:#65ab31;"></i>
        </a>
      </div>
      <div class="col text-right">
        <a href="{{ route('shift_table.index',['year'=>$nextMonth->format('Y'),'month'=>$nextMonth->format('m')]) }}">
          <i class="fa fa-lg fa-chevron-circle-right" style="color:#65ab31;"><small>{{ $nextMonth->format('Y年m月') }}</small></i>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 mt-3 ml-5 align-self-center">
        <div class="h3">{{ $firstDay->format('Y年m月') }}シフト表</div>
      </div>
    </div>

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
                @php $str = ($shift === Auth::id()) ? 'font-weight-bold':''; @endphp
                <td style="display: none;">
                  {{ $shift }}
                </td>
              @elseif($shift)
                <td class="small text-center text-nowrap {{ $str }}">
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

    @can('admin-higher')
    <div class="mt-3">
      {{ Form::open(['route'=>'shift_table.store','enctype'=>'multipart/form-data','method'=>'POST']) }}

      <div class="form-group mt-5 form-inline">
        {{ Form::label('file','添付ファイル',['class'=>'col-md-2']) }}
        <div class="input-group col-md-4">
            <div class="custom-file">
                {{ Form::file('file',['class'=>'custom-file-input','id'=>'file','name'=>'file']) }}
                {{ Form::label('file','ファイル選択...',['class'=>'custom-file-label','for'=>'file','data-browse'=>'参照']) }}
            </div>
            <div class="input-group-append">
                {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
            </div>
        </div>
        <div class="form-group text-center">
          {{ Form::button('<i class="fa fa-file-upload" aria-hidden="true"></i> シフト登録',['class'=>'btn btn-primary','type'=>'submit']) }}
        </div>
      </div>
      {{ Form::close() }}

      <div class="col-md-8 mt-5 text-center">
        <div class="btn btn-warning"><a href={{ route("shift_table.export") }}><i class="fa fa-download" aria-hidden="true"></i> ユーザー一覧ダウンロード</a></div>
      </div>
      <div class="col-md-8 mt-3 text-center">
        <div class="btn btn-warning"><a href={{ route("master_shifts.export") }}><i class="fa fa-download" aria-hidden="true"></i> マスターシフトダウンロード</a></div>
      </div>
    </div>
    @endcan

  </div>
</div>

@endsection
