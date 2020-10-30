@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('clients_detail.update', $item->projectId), 'method' => 'PUT')) }}
          {{ Form::hidden('clientId', $item->clientId) }}
          <div class="form-group">
            {{ Form::label('contractTypeId','契約形態を選択',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::select('contractTypeId',$masterContractTypes,$item->contractTypeId,['placeholder'=>'---契約形態を選択してください---','class'=>'col-md-4'])}}
            @error('contractTypeId')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('projectName','案件名',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('projectName',$item->projectName,['placeholder'=>'案件名を入力','class'=>'col-md-4','id'=>'clientName']) }}
            @error('projectName')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('startDate','開始日',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::date('startDate',$item->startDate,['class'=>'col-md-4','id'=>'startDate']) }}
          </div>
          <div class="form-group">
            {{ Form::label('endDate','完了日',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::date('endDate',$item->endDate,['class'=>'col-md-4','id'=>'endDate']) }}
          </div>
          <div class="form-group">
            {{ Form::label('workingTeamId','対応チームを選択',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::select('workingTeamId',$masterWorkingTeams,$item->workingTeamId,['placeholder'=>'---対応チームを選択してください---','class'=>'col-md-4'])}}
            @error('workingTeamId')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('slack_channel_name','Slackチャンネル名',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('slack_channel_name',$item->slack_channel_name,['placeholder'=>'Slackチャンネル名を入力','class'=>'col-md-4','id'=>'slack_channel_name']) }}
            @error('slack_channel_name')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('project_detail','案件詳細',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::textarea('project_detail',$item->project_detail,['placeholder'=>'案件説明を入力','class'=>'col-md-4','id'=>'project_detail']) }}
            @error('project_detail')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
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
