<div class="card-body">
  <div class="row">
    <div class="col-8">

    @if(session()->has('message'))
        <div class="alert alert-info mb-3">
            {{session('message')}}
            {{ old('workTableRest3StartHour') }}
        </div>
    @endif

    <div class="form-group mt-3 form-inline">
      {{ Form::label('shiftId','シフト',['class'=>'col-4']) }}
      {{ Form::select('shiftId',$masterShift,null,['class'=>'col-2 custom-select custom-select-sm','wire:model'=>'shiftId','wire:change'=>'onShiftChange'])}}
    </div>

    <div class="form-group mt-5 form-inline">
      {{ Form::label('goingWorkHour','出勤時刻',['class'=>'col-4']) }}
      {{ Form::select('goingWorkHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'goingWorkHour','wire:change'=>'goingWorkHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('goingWorkMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'goingWorkMinute','wire:change'=>'goingWorkMinuteChange']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldGoingWorkHour',$oldGoingWorkHour,['wire:model'=>'oldGoingWorkHour']) }}
      {{ Form::hidden('oldGoingWorkMinute',$oldGoingWorkMinute,['wire:model'=>'oldGoingWorkMinute']) }}
      {{ Form::hidden('activeGoingWorkHour',$activeGoingWorkHour,['wire:model'=>'activeGoingWorkHour']) }}
      {{ Form::hidden('activeGoingWorkMinute',$activeGoingWorkMinute,['wire:model'=>'activeGoingWorkMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('leavingWorkHour','退勤時刻',['class'=>'col-4']) }}
      {{ Form::select('leavingWorkHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'leavingWorkHour','wire:change'=>'leavingWorkHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('leavingWorkMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'leavingWorkMinute','wire:change'=>'leavingWorkMinuteChange']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldLeavingWorkHour',$oldLeavingWorkHour,['wire:model'=>'oldLeavingWorkHour']) }}
      {{ Form::hidden('oldLeavingWorkMinute',$oldLeavingWorkMinute,['wire:model'=>'oldLeavingWorkMinute']) }}
      {{ Form::hidden('activeLeavingWorkHour',$activeLeavingWorkHour,['wire:model'=>'activeLeavingWorkHour']) }}
      {{ Form::hidden('activeLeavingWorkMinute',$activeLeavingWorkMinute,['wire:model'=>'activeLeavingWorkMinute']) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('workTableRest1StartHour','休憩１',['class'=>'col-4']) }}
      {{ Form::select('workTableRest1StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest1StartHour','wire:change'=>'workTableRest1StartHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest1StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest1StartMinute','wire:change'=>'workTableRest1StartMinuteChange']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest1EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest1EndHour','wire:change'=>'workTableRest1EndHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest1EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest1EndMinute','wire:change'=>'workTableRest1EndMinuteChange']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest1StartHour',$oldWorkTableRest1StartHour,['wire:model'=>'oldWorkTableRest1StartHour']) }}
      {{ Form::hidden('oldWorkTableRest1StartMinute',$oldWorkTableRest1StartMinute,['wire:model'=>'oldWorkTableRest1StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest1EndHour',$oldWorkTableRest1EndHour,['wire:model'=>'oldWorkTableRest1EndHour']) }}
      {{ Form::hidden('oldWorkTableRest1EndMinute',$oldWorkTableRest1EndMinute,['wire:model'=>'oldWorkTableRest1EndMinute']) }}
      {{ Form::hidden('activeWorkTableRest1StartHour',$activeWorkTableRest1StartHour,['wire:model'=>'activeWorkTableRest1StartHour']) }}
      {{ Form::hidden('activeWorkTableRest1StartMinute',$activeWorkTableRest1StartMinute,['wire:model'=>'activeWorkTableRest1StartMinute']) }}
      {{ Form::hidden('activeWorkTableRest1EndHour',$activeWorkTableRest1EndHour,['wire:model'=>'activeWorkTableRest1EndHour']) }}
      {{ Form::hidden('activeWorkTableRest1EndMinute',$activeWorkTableRest1EndMinute,['wire:model'=>'activeWorkTableRest1EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('workTableRest2StartHour','休憩２',['class'=>'col-4']) }}
      {{ Form::select('workTableRest2StartHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest2StartHour','wire:change'=>'workTableRest2StartHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest2StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest2StartMinute','wire:change'=>'workTableRest2StartMinuteChange']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest2EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest2EndHour','wire:change'=>'workTableRest2EndHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest2EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest2EndMinute','wire:change'=>'workTableRest2EndMinuteChange']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest2StartHour',$oldWorkTableRest2StartHour,['wire:model'=>'oldWorkTableRest2StartHour']) }}
      {{ Form::hidden('oldWorkTableRest2StartMinute',$oldWorkTableRest2StartMinute,['wire:model'=>'oldWorkTableRest2StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest2EndHour',$oldWorkTableRest2EndHour,['wire:model'=>'oldWorkTableRest2EndHour']) }}
      {{ Form::hidden('oldWorkTableRest2EndMinute',$oldWorkTableRest2EndMinute,['wire:model'=>'oldWorkTableRest2EndMinute']) }}
      {{ Form::hidden('activeWorkTableRest2StartHour',$activeWorkTableRest2StartHour,['wire:model'=>'activeWorkTableRest2StartHour']) }}
      {{ Form::hidden('activeWorkTableRest2StartMinute',$activeWorkTableRest2StartMinute,['wire:model'=>'activeWorkTableRest2StartMinute']) }}
      {{ Form::hidden('activeWorkTableRest2EndHour',$activeWorkTableRest2EndHour,['wire:model'=>'activeWorkTableRest2EndHour']) }}
      {{ Form::hidden('activeWorkTableRest2EndMinute',$activeWorkTableRest2EndMinute,['wire:model'=>'activeWorkTableRest2EndMinute']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('workTableRest3StartHour','休憩３',['class'=>'col-4']) }}
      {{ Form::select('workTableRest3StartHour',Config::get('array.hour'),old('workTableRest3StartHour'),['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest3StartHour','wire:change'=>'workTableRest3StartHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest3StartMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest3StartMinute','wire:change'=>'workTableRest3StartMinuteChange']) }}<span class="ml-1">分</span>
      <span class="ml-2 mr-2">～</span>
      {{ Form::select('workTableRest3EndHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'workTableRest3EndHour','wire:change'=>'workTableRest3EndHourChange']) }}<span class="ml-1">時</span>
      {{ Form::select('workTableRest3EndMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'workTableRest3EndMinute','wire:change'=>'workTableRest3EndMinuteChange']) }}<span class="ml-1">分</span>
      {{ Form::hidden('oldWorkTableRest3StartHour',$oldWorkTableRest3StartHour,['wire:model'=>'oldWorkTableRest3StartHour']) }}
      {{ Form::hidden('oldWorkTableRest3StartMinute',$oldWorkTableRest3StartMinute,['wire:model'=>'oldWorkTableRest3StartMinute']) }}
      {{ Form::hidden('oldWorkTableRest3EndHour',$oldWorkTableRest3EndHour,['wire:model'=>'oldWorkTableRest3EndHour']) }}
      {{ Form::hidden('oldWorkTableRest3EndMinute',$oldWorkTableRest3EndMinute,['wire:model'=>'oldWorkTableRest3EndMinute']) }}
      {{ Form::hidden('activeWorkTableRest3StartHour',$activeWorkTableRest3StartHour,['wire:model'=>'activeWorkTableRest3StartHour']) }}
      {{ Form::hidden('activeWorkTableRest3StartMinute',$activeWorkTableRest3StartMinute,['wire:model'=>'activeWorkTableRest3StartMinute']) }}
      {{ Form::hidden('activeWorkTableRest3EndHour',$activeWorkTableRest3EndHour,['wire:model'=>'activeWorkTableRest3EndHour']) }}
      {{ Form::hidden('activeWorkTableRest3EndMinute',$activeWorkTableRest3EndMinute,['wire:model'=>'activeWorkTableRest3EndMinute']) }}
    </div>

    <div class="form-group mt-4 ml-5 col-4 text-center">
      <div class="custom-control custom-checkbox">
        {{ Form::checkbox('lateEarlyLeave',1,null,['class'=>'custom-control-input','id'=>'lateEarlyLeave','wire:model'=>'lateEarlyLeave','wire:change'=>'checkLateEarlyLeave']) }}
        {{ Form::label('lateEarlyLeave','遅刻早退',['class'=>'custom-control-label','style'=>'cursor:pointer;']) }}
      </div>
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('specialReason','特別事由',['class'=>'col-4']) }}
      {{ Form::textarea('specialReason',$specialReason,['class'=>'form-control col-8','rows'=>3,$disabled]) }}
    </div>

    <div class="form-group mt-4 form-inline">
      {{ Form::label('remarks','備考',['class'=>'col-4']) }}
      {{ Form::textarea('remarks',$remarks,['class'=>'form-control col-8','rows'=>3,'wire:model'=>'remarks']) }}
    </div>

    <div class="">
      {{ floor($calcWorkHour/3600).'時間'.(($calcWorkHour%3600)/60).'分' }}<br>
      <div id = 'calcWorkHour'>{{$calcWorkHour/60}}</div>
    </div>

    </div>
  </div>
</div>
