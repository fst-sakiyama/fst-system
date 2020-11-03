@section('content')
@php
  $date = new Carbon\Carbon($workTable->workDay);
  $week = array( "日", "月", "火", "水", "木", "金", "土" );
  $d = $date->format('Y年m月d日');
  $w = '('.$week[$date->dayOfWeek].')';
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">{{$d.$w}} -勤務情報の編集</h5>

        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="workTable-tab" data-toggle="tab" href="#workTable" role="tab" aria-controls="workTable">勤務表</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="workLoad-tab" data-toggle="tab" href="#workLoad" role="tab" aria-controls="workLoad">工数表</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="tab-content" id="myTab-content">

          <div class="tab-pane fade show active" id="workTable" role="tabpanel" aria-labelledby="workTable-tab">
            <div class="row">
              <div class="col">

                <div class="card">

                    {{ Form::open(['route'=>'work_table.store','name'=>'workTable_form']) }}
                    {{ Form::hidden('workDay',$workTable->workDay )}}
                    {{ Form::hidden('userId',$workTable->userId) }}


                    <livewire:work-table :workTable=$workTable :masterShift=$masterShift>


                </div>

              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="workLoad" role="tabpanel" aria-labelledby="workLoad-tab">
            <div class="card">

              <div class="card-body">
                <div class="form-group form-inline">
                  <div class="row">
                    <div class="col-2 text-right">
                      {{ Form::label('calcWorkMin','稼働時間',['class'=>'col-form-label']) }}
                    </div>
                    <div class="col-2 form-inline">
                      {{ Form::text('calcWorkMin',0,['id'=>'wl-calcWorkMin','class'=>'form-control col-6 text-right','disabled']) }}<span class="ml-2">分</span>
                      {{ Form::hidden('calcWorkMin',0,['id'=>'hidden-wl-calcWorkMin'])}}
                    </div>
                    <div class="col-2 text-right">
                      {{ Form::label('calcWorkMin','稼働工数',['class'=>'col-form-label']) }}
                    </div>
                    <div class="col-2 form-inline">
                      {{ Form::text('sumCalcWorkMin',0,['id'=>'wl-sumCalcWorkMin','class'=>'form-control col-6 text-right','disabled']) }}<span class="ml-2">分</span>
                      {{ Form::hidden('sumCalcWorkMin',0,['id'=>'hidden-wl-sumCalcWorkMin'])}}
                    </div>
                    <div class="col-2 text-right">
                      {{ Form::label('calcWorkMin','未振分け',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-2 form-inline">
                      {{ Form::text('subCalcWorkMin',0,['id'=>'wl-subCalcWorkMin','class'=>'form-control col-6 text-right','disabled']) }}<span class="ml-2">分</span>
                      {{ Form::hidden('subCalcWorkMin',0,['id'=>'hidden-wl-subCalcWorkMin'])}}
                    </div>
                  </div>
                </div>
              </div>

              <table class="table table-sm table-hover" style="table-layout:fixed;">
                <thead style="display:block;">
                  <tr>
                    <th class="clientName">顧客名</th>
                    <th class="projectName">案件名</th>
                    <th class="workLoad">工数(分)</th>
                  </tr>
                </thead>
                <tbody style="display:block;overflow-y:scroll;height:600px;">
                  @foreach($masterProjects as $masterProject)

                    <tr>
                      <td class="clientName">
                        {{ $masterProject->client->clientName }}
                      </td>
                      <td class="projectName">
                        {{ $masterProject->projectName }}
                      </td>
                      <td class="workLoad">

                        <livewire:work-load :masterProject=$masterProject>

                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

        </div>

        <div class="card-footer d-flex justify-content-center align-middle">

          {{ Form::button('編集を登録する',['class'=>'btn btn-primary','type'=>'submit']) }}
          {{ Form::close() }}

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
