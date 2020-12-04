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

                  <div id="input_pluralBox">
                      <div id="input_plural">
                          <div class="form-group form-inline">
                              {{ Form::label('weekDay','実施',['class'=>'col-form-label col-4']) }}
                              {{ Form::select('weekDay',Config::get('array.weekDay'),null,['class'=>'custom-select custom-select-sm']) }}<span class="ml-1">曜日</span>
                              {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'ml-4 custom-select custom-select-sm']) }}<span class="ml-1">時</span>
                              {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm']) }}<span class="ml-1">分</span>
                              {{ Form::button('＋',['class'=>'add ml-4 btn btn-outline-primary p-0']) }}
                              {{ Form::button('－',['class'=>'del ml-1 btn btn-outline-danger p-0']) }}
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
