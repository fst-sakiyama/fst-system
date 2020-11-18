@section('content')
@php
  $date = new Carbon\Carbon($workTable->workDay);
  $week = array( "日", "月", "火", "水", "木", "金", "土" );
  $d = $date->format('Y年m月d日');
  $w = '('.$week[$date->dayOfWeek].')';
  $prevId = null;
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">{{$d.$w}} -勤務情報の編集</h5>

        <div id='messageBlock' class="row d-none">
          <div class="col">
            <div id='message' class="alert alert-danger m-3">

            </div>
          </div>
        </div>

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

                <div style="height:600px; overflow-y:scroll">

                  <div class="card">

                      {{ Form::open(['route'=>'work_table.store','name'=>'workTable_form']) }}
                      {{ Form::hidden('workDay',$workTable->workDay )}}
                      {{ Form::hidden('userId',$workTable->userId) }}
                      {{ Form::hidden('shiftTableId',$shiftTableId) }}
                      {{ Form::hidden('nonOpe',$nonOpe) }}

                      @php $workTable->workTable ? $workTable = $workTable->workTable : $workTable ; @endphp

                      <livewire:work-table :workTable=$workTable :masterShift=$masterShift>


                  </div>

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

              <div style="height:600px; overflow-y:scroll">
                <table class="table table-sm table-hover">
                  <thead>
                    <tr>
                      <th class="projectName" style="width:50%;">案件名</th>
                      <th class="beforWorkLoad" style="width:8%;">前勤務</th>
                      <th class="workLoad" style="width:12%;">工数(分)</th>
                      <th class="memo" style="width:30%;">メモ</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($teamProjects as $teamProject)
                      @php $nowId = $teamProject->project->client->clientId; $teamProjectId = $teamProject->teamProjectId; @endphp

                      @if(is_null($prevId) || $teamProject->project->client->clientId !== $prevId)
                        <tr class="table-primary h5" data-link={{$nowId}} style="cursor:pointer;">
                          <td class="projectName">
                            {{ $teamProject->project->client->clientName }}
                          </td>
                          <td class="beforWorkLoad">
                            {{ Form::text('tempbf',null,['id'=>'before'.$nowId,'class'=>'text-right form-control input-sm','disabled']) }}
                          </td>
                          <td class="workLoad">
                            {{ Form::text('tempwl',null,['id'=>'workLoadSum'.$nowId,'class'=>'text-right form-control input-sm','disabled']) }}
                          </td>
                          <td id='workLoadMemo{{$nowId}}' class="align-middle small pl-3 memo">
                          </td>
                        </tr>
                      @endif

                      <tr class="slideRow{{$nowId}} d-none">
                        <td class="projectName">
                          {{ $teamProject->project->projectName }}
                        </td>
                        <td class="beforWorkLoad">

                          <livewire:before-work-load :teamProjectId=$teamProjectId :before=$before :nowId=$nowId>

                        </td>
                        <td class="workLoad text-right">

                          <livewire:work-load :teamProjectId=$teamProjectId :nonOpe=$nonOpe :workLoads=$workLoads :nowId=$nowId>

                        </td>
                        <td class="memo">

                          <livewire:work-load-memo :teamProjectId=$teamProjectId :nonOpe=$nonOpe :workLoads=$workLoads :nowId=$nowId>

                        </td>
                      </tr>

                      @php $prevId = $nowId; @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>

        </div>

        <div class="card-footer d-flex justify-content-center align-middle">

          {{ Form::button('編集を登録する',['class'=>'btn btn-primary','type'=>'submit','id'=>'workSubmit']) }}
          {{ Form::close() }}

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
