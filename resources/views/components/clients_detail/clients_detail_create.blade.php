@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'clients_detail.store']) }}
            {{ Form::hidden('clientId',$clientId) }}
            <div class="form-group">
              {{ Form::label('contractTypeId','契約形態を選択',['class'=>'col-md-2 col-form-label']) }}
              {{ Form::select('contractTypeId',$masterContractTypes,null,['placeholder'=>'---契約形態を選択してください---','class'=>'col-md-4'])}}
              @error('contractTypeId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('projectName','案件名',['class'=>'col-md-2 col-form-label']) }}
              {{ Form::text('projectName',null,['placeholder'=>'案件名を入力','class'=>'col-md-4','id'=>'projectName']) }}
              @error('projectName')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('startDate','開始日',['class'=>'col-md-2 col-form-label']) }}
              {{ Form::date('startDate',null,['class'=>'col-md-4','id'=>'startDate']) }}
            </div>
            <div class="form-group">
              {{ Form::label('endDate','完了日',['class'=>'col-md-2 col-form-label']) }}
              {{ Form::date('endDate',null,['class'=>'col-md-4','id'=>'endDate']) }}
            </div>
            <div class="form-group">
              {{ Form::label('workingTeamId','対応チームを選択',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::select('workingTeamId',$masterWorkingTeams,null,['placeholder'=>'---対応チームを選択してください---','class'=>'col-md-4'])}}
              @error('workingTeamId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('slack_channel_name','Slackチャンネル名',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::text('slack_channel_name',null,['placeholder'=>'Slackチャンネル名を入力','class'=>'col-md-4','id'=>'slack_channel_name']) }}
              @error('slack_channel_name')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('project_detail','案件詳細',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::textarea('project_detail',null,['placeholder'=>'案件説明を入力','class'=>'col-md-4','id'=>'project_detail']) }}
              @error('project_detail')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
