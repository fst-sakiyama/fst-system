@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                  <div class="form-group form-inline">
                      {{ Form::label('liveName','ライブ名',['class'=>'col-form-label col-4']) }}
                      {{ Form::text('liveName',null,['placeholder'=>'ライブ名を入力','class'=>'form-control col-md-4']) }}
                  </div>

                  <div class="form-group form-inline">
                      {{ Form::label('forHolidays','祝日の対応',['class'=>'col-form-label col-4']) }}
                      {{ Form::select('forHolidays',Config::get('array.forHolidays'),null,['class'=>'custom-select']) }}
                  </div>

                  <div class="form-group form-inline">
                      {{ Form::label('weekDay','実施曜日',['class'=>'col-form-label col-4']) }}
                      {{ Form::select('weekDay',Config::get('array.weekDay'),null,['class'=>'custom-select custom-select-sm']) }}
                  </div>

                  <div class="form-group form-inline">
                      {{ Form::label('startHour','開始時刻',['class'=>'col-form-label col-4']) }}
                      {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'custom-select custom-select-sm','wire:model'=>'startHour','wire:change'=>'startHourChange','id'=>'startHour']) }}<span class="ml-1">時</span>
                      {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','wire:model'=>'startMinute','wire:change'=>'startMinuteChange','id'=>'startMinute']) }}<span class="ml-1">分</span>
                  </div>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
