@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                  <div class="card-header">
                      定例ライブの新規登録
                  </div>

                  {{ Form::open(['route'=>'live_monitaring_plan.masterStore']) }}

                  <div class="card-body">

                      <div id='messageBlock' class="row d-none">
                        <div class="col">
                          <div id='message' class="alert alert-danger m-3">

                          </div>
                        </div>
                      </div>

                      <div class="form-group form-inline mt-3">
                          {{ Form::label('liveName','ライブ名',['class'=>'col-form-label col-4']) }}
                          {{ Form::text('liveName',null,['placeholder'=>'ライブ名を入力','class'=>'form-control col-md-4','id'=>'liveName']) }}
                      </div>

                      <div class="form-group form-inline mb-4">
                          {{ Form::label('forHolidays','祝日の対応',['class'=>'col-form-label col-4']) }}
                          {{ Form::select('forHolidays',Config::get('array.forHolidays'),null,['class'=>'custom-select','id'=>'forHolidays']) }}
                      </div>

                      <div id="input_pluralBox">
                          <div id="input_plural">
                              <div class="form-group form-inline">
                                  {{ Form::label('weekDay','実施',['class'=>'col-form-label col-4']) }}
                                  {{ Form::select('weekDay',Config::get('array.weekDay'),null,['class'=>'custom-select custom-select-sm','name'=>'weekDay[]']) }}<span class="ml-1">曜日</span>
                                  {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'ml-4 custom-select custom-select-sm','name'=>'startHour[]']) }}<span class="ml-1">時</span>
                                  {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select custom-select-sm','name'=>'startMinute[]']) }}<span class="ml-1">分</span>
                                  {{ Form::button('＋',['class'=>'add ml-4 btn btn-outline-primary py-0 px-1']) }}
                                  {{ Form::button('－',['class'=>'del ml-1 btn btn-outline-danger py-0 px-1']) }}
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="card-footer text-center">
                      {{ Form::button('新規登録',['class'=>'w-25 btn btn-primary','type'=>'submit','id'=>'regLiveSubmit']) }}
                      {{ Form::close() }}
                  </div>

              </div>


          </div>
      </div>
  </div>
</div>
@endsection
