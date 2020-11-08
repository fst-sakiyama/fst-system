@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnLinkButton',['item'=>'/master_clients'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">顧客一覧</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'master_clients.store']) }}
            <div class="form-group form-inline">
              {{ Form::label('clientName','顧客名',['class'=>'col-form-label col-4']) }}
              {{ Form::text('clientName',null,['placeholder'=>'顧客名を入力','class'=>'form-control col-md-4','id'=>'clientName']) }}
              @error('clientName')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group form-inline">
              {{ Form::label('slack_prefix','SlackPrefix',['class'=>'col-form-label col-4']) }}
              {{ Form::text('slack_prefix',null,['placeholder'=>'数字3桁を入力','class'=>'form-control col-md-4','id'=>'slack_prefix']) }}
              @error('slack_prefix')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group form-inline">
              {{ Form::label('slack_abbreviated','Slack表記略称',['class'=>'col-form-label col-4']) }}
              {{ Form::text('slack_abbreviated',null,['placeholder'=>'Slack表記略称を入力','class'=>'form-control col-md-4','id'=>'slack_abbreviated']) }}
              @error('slack_abbreviated')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
