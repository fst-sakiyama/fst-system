@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                  <div class="card-header">
                      定例臨時登録
                  </div>

                  {{ Form::open(['route'=>'live_monitaring_plan.regLiveStore']) }}

                  <div class="card-body">

                      <div id='messageBlock' class="row d-none">
                        <div class="col">
                          <div id='message' class="alert alert-danger m-3">

                          </div>
                        </div>
                      </div>

                      <div class="form-group form-inline mt-3">
                          {{ Form::label('regLiveId','ライブ名を選択',['class'=>'col-md-4 col-form-label']) }}
                          {{ Form::select('regLiveId',$items,null,['placeholder'=>'---ライブ名を選択してください---','class'=>'form-control col-md-4'])}}
                      </div>

                      <div class="form-group form-inline">
                          {{ Form::label('weekDay','開始時刻',['class'=>'col-form-label col-4']) }}
                          {{ Form::date('eventDay',\Carbon\Carbon::now(),['class'=>'form-control']) }}
                          {{ Form::select('startHour',Config::get('array.hour'),null,['class'=>'ml-3 custom-select','name'=>'startHour']) }}<span class="ml-1">時</span>
                          {{ Form::select('startMinute',Config::get('array.minutes'),null,['class'=>'ml-2 custom-select','name'=>'startMinute']) }}<span class="ml-1">分</span>
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
