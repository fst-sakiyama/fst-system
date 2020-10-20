<div class="card-body">
  <div class="mt-3">

    <div class="form-group mt-3 form-inline">
      {{ Form::label('shiftId','シフト',['class'=>'col-2']) }}
      {{ Form::select('shiftId',$masterShift,null,['class'=>'col-2 custom-select custom-select-sm','wire:model'=>'shiftId','wire:change'=>'onShiftChange'])}}
    </div>

    <div class="form-group mt-5 form-inline">
      {{ Form::label('goingWorkHour','出勤時刻',['class'=>'col-2']) }}
      {{ Form::select('goingWorkHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'goingWorkHour']) }}<span class="ml-1">時</span>
      {{ Form::select('goingWorkMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'goingWorkMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldGoingWorkHour',$oldGoingWorkHour,['wire:model'=>'oldGoingWorkHour']) }}
      {{ Form::hidden('oldGoingWorkMinute',$oldGoingWorkMinute,['wire:model'=>'oldGoingWorkMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('leavingWorkHour','退勤時刻',['class'=>'col-2']) }}
      {{ Form::select('leavingWorkHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'leavingWorkHour']) }}<span class="ml-1">時</span>
      {{ Form::select('leavingWorkMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'leavingWorkMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldLeavingWorkHour',$oldLeavingWorkHour,['wire:model'=>'oldLeavingWorkHour']) }}
      {{ Form::hidden('oldLeavingWorkMinute',$oldLeavingWorkMinute,['wire:model'=>'oldLeavingWorkMinute']) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('workTableRest1StartHour','休憩１',['class'=>'col-2']) }}
      {{ Form::select('workTableRest1StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest1StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest1StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest1StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest1EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest1EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest1EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest1EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest1StartHour',$oldWorkTableRest1StartHour,['wire:model'=>'oldWorkTableRest1StartHour']) }}
      {{ Form::hidden('oldWorkTableRest1StartMinute',$oldWorkTableRest1StartMinute,['wire:model'=>'oldWorkTableRest1StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest1EndHour',$oldWorkTableRest1EndHour,['wire:model'=>'oldWorkTableRest1EndHour']) }}
      {{ Form::hidden('oldWorkTableRest1EndMinute',$oldWorkTableRest1EndMinute,['wire:model'=>'oldWorkTableRest1EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('workTableRest2StartHour','休憩２',['class'=>'col-2']) }}
      {{ Form::select('workTableRest2StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest2StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest2StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest2StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest2EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest2EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest2EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest2EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest2StartHour',$oldWorkTableRest2StartHour,['wire:model'=>'oldWorkTableRest2StartHour']) }}
      {{ Form::hidden('oldWorkTableRest2StartMinute',$oldWorkTableRest2StartMinute,['wire:model'=>'oldWorkTableRest2StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest2EndHour',$oldWorkTableRest2EndHour,['wire:model'=>'oldWorkTableRest2EndHour']) }}
      {{ Form::hidden('oldWorkTableRest2EndMinute',$oldWorkTableRest2EndMinute,['wire:model'=>'oldWorkTableRest2EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('workTableRest3StartHour','休憩３',['class'=>'col-2']) }}
      {{ Form::select('workTableRest3StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest3StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest3StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest3StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest3EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest3EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest3EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest3EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest3StartHour',$oldWorkTableRest3StartHour,['wire:model'=>'oldWorkTableRest3StartHour']) }}
      {{ Form::hidden('oldWorkTableRest3StartMinute',$oldWorkTableRest3StartMinute,['wire:model'=>'oldWorkTableRest3StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest3EndHour',$oldWorkTableRest3EndHour,['wire:model'=>'oldWorkTableRest3EndHour']) }}
      {{ Form::hidden('oldWorkTableRest3EndMinute',$oldWorkTableRest3EndMinute,['wire:model'=>'oldWorkTableRest3EndMinute']) }}
    </div>

    <div class="form-group mt-4 ml-5 col-4 text-center">
      <div class="custom-control custom-checkbox">
        {{ Form::checkbox('lateEarlyLeave',1,null,['class'=>'custom-control-input','id'=>'lateEarlyLeave','wire:model'=>'lateEarlyLeave','wire:change'=>'checkLateEarlyLeave']) }}
        {{ Form::label('lateEarlyLeave','遅刻早退',['class'=>'custom-control-label','style'=>'cursor:pointer;']) }}
      </div>
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('specialReason','特別事由',['class'=>'col-2']) }}
      {{ Form::textarea('specialReason',$specialReason,['class'=>'form-control col-4','rows'=>3,$disabled]) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('remarks','備考',['class'=>'col-2']) }}
      {{ Form::textarea('remarks',$remarks,['class'=>'form-control col-4','rows'=>3,'wire:model'=>'remarks']) }}
    </div>

  </div>
</div>
