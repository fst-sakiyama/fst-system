<div class="card-body">
  <div class="mt-3">

    <div class="form-group mt-3 form-inline">
      {{ Form::select('shiftId',$masterShift,null,['class'=>'col-md-4','wire:model'=>'shiftId','wire:change'=>'onShiftChange'])}}

    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('goingWorkHour','出勤時刻',['class'=>'col-2']) }}
      {{ Form::select('goingWorkHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'goingWorkHour']) }}時
      {{ Form::select('goingWorkMinute',Config::get('array.minutes'),$goingWorkMinute,['class'=>'custom-select custom-select-sm','wire:model'=>'goingWorkMinute']) }}分
      {{ Form::hidden('oldGoingWorkHour',$oldGoingWorkHour,['wire:model'=>'oldGoingWorkHour']) }}
      {{ Form::hidden('oldGoingWorkMinute',$oldGoingWorkMinute,['wire:model'=>'oldGoingWorkMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('leavingWorkHour','出勤時刻',['class'=>'col-2']) }}
      {{ Form::select('leavingWorkHour',Config::get('array.hour'),$leavingWorkHour,['class'=>'custom-select custom-select-sm','wire:model'=>'leavingWorkHour']) }}時
      {{ Form::select('leavingWorkMinute',Config::get('array.minutes'),$leavingWorkMinute,['class'=>'custom-select custom-select-sm','wire:model'=>'leavingWorkMinute']) }}分
    </div>

    {{ $shiftId }}<br>
    {{ $year }}<br>
    {{ $month }}<br>
    {{ $workDay }}<br>

  </div>
</div>
