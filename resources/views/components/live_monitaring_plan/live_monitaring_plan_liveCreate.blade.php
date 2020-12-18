@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                  <div class="card-header">
                      ライブ登録
                  </div>

                  {{ Form::open(['route'=>'live_monitaring_plan.liveStore']) }}

                  <div class="card-body">

                      <div id='messageBlock' class="row d-none">
                        <div class="col">
                          <div id='message' class="alert alert-danger m-3">

                          </div>
                        </div>
                      </div>

                      <div class="form-group form-inline mt-3 ml-5">
                          <div class="col-md-4 col-md-offset-4">
                              <label for='dvr' style="cursor:pointer;" id='checkboxDvr' class="text-center">
                                  {{ Form::checkbox('dvr',1,false,['class'=>'circle','style'=>'transform:scale(1.5);cursor:pointer;','id'=>'dvr']) }}
                                  <img class="ml-5 checkboxPng" alt='ラベル' src="{{ asset( 'images/live_normal.png' ) }}" width="120px">
                                  <img class="ml-5 checkboxPng d-none" alt='ラベル' src="{{ asset( 'images/live_DVR.png' ) }}" width="120px">
                              </label>
                          </div>
                      </div>

                      <div class="form-group form-inline mt-5">
                          {{ Form::label('issueNo','issueNo',['class'=>'col-md-4 col-form-label']) }}
                          {{ Form::text('issueNo',null,['class'=>'form-control col-md-1']) }}
                      </div>

                      <div class="form-group form-inline">
                          {{ Form::label('eventDay','開催日',['class'=>'col-form-label col-4']) }}
                          {{ Form::date('eventDay',\Carbon\Carbon::now(),['class'=>'form-control']) }}
                      </div>

                      <div class="form-group form-inline">
                          {{ Form::label('weekDay','開始終了時刻',['class'=>'col-form-label col-4']) }}
                          {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'ml-3 custom-select','name'=>'startHour']) }}<span class="ml-1">時</span>
                          {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select','name'=>'startMinute']) }}<span class="ml-1">分</span>
                          <span class="mx-1">～</span>
                          {{ Form::select('endHour',Config::get('array.hour'),null,['class'=>'ml-3 custom-select','name'=>'endHour']) }}<span class="ml-1">時</span>
                          {{ Form::select('endMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select','name'=>'endMinute']) }}<span class="ml-1">分</span>
                      </div>

                      <div class="form-group form-inline mt-3">
                          {{ Form::label('liveName','ライブ名',['class'=>'col-md-4 col-form-label']) }}
                          {{ Form::text('liveName',null,['placeholder'=>'ライブ名を入力してください','class'=>'form-control col-md-6']) }}
                      </div>

                      <div class="form-group form-inline mt-3">
                          {{ Form::label('specialNote','特記事項',['class'=>'col-md-4 col-form-label']) }}
                          {{ Form::textarea('specialNote',null,['class'=>'form-control col-md-6']) }}
                      </div>

                  </div>

                  <div class="card-footer text-center">
                      {{ Form::button('登録',['class'=>'w-25 btn btn-primary','type'=>'submit','id'=>'regLiveSubmit']) }}
                      {{ Form::close() }}
                  </div>

              </div>


          </div>
      </div>
  </div>
</div>
@endsection
