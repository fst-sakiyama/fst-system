@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnLinkButton',['item'=>'/master_projects'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('clients_detail.update', $item->projectId), 'method' => 'PUT')) }}
          {{ Form::hidden('clientId', $item->clientId) }}
          <div class="form-group">
            {{ Form::label('contractTypeId','契約形態を選択',['class'=>'col-md-4 col-form-label']) }}
            {{ Form::select('contractTypeId',$masterContractTypes,$item->contractTypeId,['placeholder'=>'---契約形態を選択してください---','class'=>'col-md-6'])}}
            @error('contractTypeId')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('projectName','案件名',['class'=>'col-md-4 col-form-label']) }}
            {{ Form::text('projectName',$item->projectName,['placeholder'=>'案件名を入力','class'=>'col-md-6','id'=>'clientName']) }}
            @error('projectName')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('startDate','開始日',['class'=>'col-md-4 col-form-label']) }}
            {{ Form::date('startDate',$item->startDate,['class'=>'col-md-6','id'=>'startDate']) }}
          </div>
          <div class="form-group">
            {{ Form::label('endDate','完了日',['class'=>'col-md-4 col-form-label']) }}
            {{ Form::date('endDate',$item->endDate,['class'=>'col-md-6','id'=>'endDate']) }}
          </div>
          <div class="form-group">
            {{ Form::label('master_project_detail','案件詳細',['class'=>'col-md-4 col-form-label']) }}
            {{ Form::textarea('master_project_detail',$item->project_detail,['placeholder'=>'案件説明を入力','class'=>'col-md-6','id'=>'master_project_detail']) }}
          </div>

          <div class="row mx-3 my-4">
            <div class="col">
              営業フィーについては考慮不要です。<br>
              実際に対応するチームを選択してください。<br>
              将来、金額の按分等を行うためにテーブルを分けております。
            </div>
          </div>
          @if(session()->has('message'))
            <div class="row mx-3 my-4">
              <div class="alert alert-danger">
                  {{session('message')}}
              </div>
            </div>
          @endif

          @foreach($masterWorkingTeams as $team)
            @php
              $res = App\Models\TeamProject::where('projectId',$item->projectId)->where('workingTeamId',$team->workingTeamId)->first();
            @endphp
            @if($res)
              {{ Form::hidden('teamProjectId['.$team->workingTeamId.']',$res->teamProjectId) }}
            @endif
            <div class="form-group ml-4">
              <div class="form-inline">
              {{ Form::checkbox('workingTeamId['.$team->workingTeamId.']',$team->workingTeamId,$res ? true : false,['id'=>'item'.$team->workingTeamId,'class'=>'circle','style'=>'transform:scale(1.5)','data-id'=>$team->workingTeamId] )}}
              {{ Form::label('item'.$team->workingTeamId,$team->workingTeam,['class'=>'form-check-label ml-4']) }}
              </div>
            </div>
            <div class="form-group hideAndSeek" style="display:none;" data-id={{$team->workingTeamId}}>
              {{ Form::label('slack_channel_name','Slackチャンネル名',['class'=>'col-md-4 col-form-label']) }}
              {{ Form::text('slack_channel_name['.$team->workingTeamId.']',$res ? $res->slack_channel_name : null,['placeholder'=>'Slackチャンネル名を入力','class'=>'col-md-6','id'=>'slack_channel_name']) }}
            </div>
            <div class="form-group hideAndSeek" style="display:none;" data-id={{$team->workingTeamId}}>
              {{ Form::label('project_detail','案件詳細',['class'=>'col-md-4 col-form-label']) }}
              {{ Form::textarea('project_detail['.$team->workingTeamId.']',$res ? $res->project_detail : null,['placeholder'=>'案件説明を入力','class'=>'col-md-6','id'=>'project_detail']) }}
            </div>

          @endforeach

        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('情報更新',['class'=>'w-25 btn btn-primary']) }}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
