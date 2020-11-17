<div class="card-body">
  <div class="row">
    <div class="col-8">

    <div class="form-group mt-3 form-inline">
      {{ Form::label('shiftId','シフト',['class'=>'col-4']) }}
      {{ Form::select('shiftId',$masterShift,null,['class'=>'col-2 custom-select custom-select-sm','wire:model'=>'shiftId','wire:change'=>'onShiftChange'])}}
    </div>

    <div class="form-group mt-5 form-inline">
      {{ Form::label('startHour','出勤時刻',['class'=>'col-4']) }}
      {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'startHour','wire:change'=>'startHourChange','id'=>'startHour']) }}<span class="ml-1">時</span>
      {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'startMinute','wire:change'=>'startMinuteChange','id'=>'startMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldstartHour',$oldstartHour,['wire:model'=>'oldstartHour']) }}
      {{ Form::hidden('oldstartMinute',$oldstartMinute,['wire:model'=>'oldstartMinute']) }}
      {{ Form::hidden('activestartHour',$activestartHour,['wire:model'=>'activestartHour']) }}
      {{ Form::hidden('activestartMinute',$activestartMinute,['wire:model'=>'activestartMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('endHour','退勤時刻',['class'=>'col-4']) }}
      {{ Form::select('endHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'endHour','wire:change'=>'endHourChange','id'=>'endHour']) }}<span class="ml-1">時</span>
      {{ Form::select('endMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'endMinute','wire:change'=>'endMinuteChange','id'=>'endMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldendHour',$oldendHour,['wire:model'=>'oldendHour']) }}
      {{ Form::hidden('oldendMinute',$oldendMinute,['wire:model'=>'oldendMinute']) }}
      {{ Form::hidden('activeendHour',$activeendHour,['wire:model'=>'activeendHour']) }}
      {{ Form::hidden('activeendMinute',$activeendMinute,['wire:model'=>'activeendMinute']) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('rest1StartHour','休憩１',['class'=>'col-4']) }}
      {{ Form::select('rest1StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'rest1StartHour','wire:change'=>'rest1StartHourChange','id'=>'rest1StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest1StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest1StartMinute','wire:change'=>'rest1StartMinuteChange','id'=>'rest1StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('rest1EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'rest1EndHour','wire:change'=>'rest1EndHourChange','id'=>'rest1EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest1EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest1EndMinute','wire:change'=>'rest1EndMinuteChange','id'=>'rest1EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldrest1StartHour',$oldrest1StartHour,['wire:model'=>'oldrest1StartHour']) }}
      {{ Form::hidden('oldrest1StartMinute',$oldrest1StartMinute,['wire:model'=>'oldrest1StartMinute']) }}
      {{ Form::hidden('oldrest1EndHour',$oldrest1EndHour,['wire:model'=>'oldrest1EndHour']) }}
      {{ Form::hidden('oldrest1EndMinute',$oldrest1EndMinute,['wire:model'=>'oldrest1EndMinute']) }}
      {{ Form::hidden('activerest1StartHour',$activerest1StartHour,['wire:model'=>'activerest1StartHour']) }}
      {{ Form::hidden('activerest1StartMinute',$activerest1StartMinute,['wire:model'=>'activerest1StartMinute']) }}
      {{ Form::hidden('activerest1EndHour',$activerest1EndHour,['wire:model'=>'activerest1EndHour']) }}
      {{ Form::hidden('activerest1EndMinute',$activerest1EndMinute,['wire:model'=>'activerest1EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('rest2StartHour','休憩２',['class'=>'col-4']) }}
      {{ Form::select('rest2StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'rest2StartHour','wire:change'=>'rest2StartHourChange','id'=>'rest2StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest2StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest2StartMinute','wire:change'=>'rest2StartMinuteChange','id'=>'rest2StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('rest2EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'rest2EndHour','wire:change'=>'rest2EndHourChange','id'=>'rest2EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest2EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest2EndMinute','wire:change'=>'rest2EndMinuteChange','id'=>'rest2EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldrest2StartHour',$oldrest2StartHour,['wire:model'=>'oldrest2StartHour']) }}
      {{ Form::hidden('oldrest2StartMinute',$oldrest2StartMinute,['wire:model'=>'oldrest2StartMinute']) }}
      {{ Form::hidden('oldrest2EndHour',$oldrest2EndHour,['wire:model'=>'oldrest2EndHour']) }}
      {{ Form::hidden('oldrest2EndMinute',$oldrest2EndMinute,['wire:model'=>'oldrest2EndMinute']) }}
      {{ Form::hidden('activerest2StartHour',$activerest2StartHour,['wire:model'=>'activerest2StartHour']) }}
      {{ Form::hidden('activerest2StartMinute',$activerest2StartMinute,['wire:model'=>'activerest2StartMinute']) }}
      {{ Form::hidden('activerest2EndHour',$activerest2EndHour,['wire:model'=>'activerest2EndHour']) }}
      {{ Form::hidden('activerest2EndMinute',$activerest2EndMinute,['wire:model'=>'activerest2EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('rest3StartHour','休憩３',['class'=>'col-4']) }}
      {{ Form::select('rest3StartHour',Config::get('array.hour'),old('rest3StartHour'),['class'=>'custom-select custom-select-sm','wire:model'=>'rest3StartHour','wire:change'=>'rest3StartHourChange','id'=>'rest3StartHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest3StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest3StartMinute','wire:change'=>'rest3StartMinuteChange','id'=>'rest3StartMinute']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('rest3EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'rest3EndHour','wire:change'=>'rest3EndHourChange','id'=>'rest3EndHour']) }}<span class="ml-1">時</span>
      {{ Form::select('rest3EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'rest3EndMinute','wire:change'=>'rest3EndMinuteChange','id'=>'rest3EndMinute']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldrest3StartHour',$oldrest3StartHour,['wire:model'=>'oldrest3StartHour']) }}
      {{ Form::hidden('oldrest3StartMinute',$oldrest3StartMinute,['wire:model'=>'oldrest3StartMinute']) }}
      {{ Form::hidden('oldrest3EndHour',$oldrest3EndHour,['wire:model'=>'oldrest3EndHour']) }}
      {{ Form::hidden('oldrest3EndMinute',$oldrest3EndMinute,['wire:model'=>'oldrest3EndMinute']) }}
      {{ Form::hidden('activerest3StartHour',$activerest3StartHour,['wire:model'=>'activerest3StartHour']) }}
      {{ Form::hidden('activerest3StartMinute',$activerest3StartMinute,['wire:model'=>'activerest3StartMinute']) }}
      {{ Form::hidden('activerest3EndHour',$activerest3EndHour,['wire:model'=>'activerest3EndHour']) }}
      {{ Form::hidden('activerest3EndMinute',$activerest3EndMinute,['wire:model'=>'activerest3EndMinute']) }}
    </div>

    <div class="form-group mt-4 ml-5 col-4 text-center">
      <div class="custom-control custom-checkbox">
        {{ Form::checkbox('lateEarlyLeave',1,null,['class'=>'custom-control-input','id'=>'lateEarlyLeave','wire:model'=>'lateEarlyLeave','wire:change'=>'checkLateEarlyLeave','id'=>'lateEarlyLeave']) }}
        {{ Form::label('lateEarlyLeave','遅刻早退',['class'=>'custom-control-label','style'=>'cursor:pointer;']) }}
      </div>
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('specialReason','特別事由',['class'=>'col-4']) }}
      {{ Form::textarea('specialReason',$specialReason,['class'=>'form-control col-8','rows'=>3,$disabled,'id'=>'specialReason']) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('remarks','備考',['class'=>'col-4']) }}
      {{ Form::textarea('remarks',$remarks,['class'=>'form-control col-8','rows'=>3,'wire:model'=>'remarks']) }}
    </div>

    <div class="d-none">
      {{ floor($calcWorkHour/3600).'時間'.(($calcWorkHour%3600)/60).'分' }}<br>
      <div id = 'calcWorkHour'>{{$calcWorkHour/60}}</div>
    </div>

    </div>
  </div>
</div>
