@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnLinkButton',['item'=>'/master_clients'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">顧客一覧</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('master_clients.update', $item->clientId), 'method' => 'PUT')) }}
          {{ Form::hidden('clientId', $item->clientId) }}
          <div class="form-group">
            {{ Form::label('slack_prefix','SlackPrefix',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('slack_prefix',$item->slack_prefix,['placeholder'=>'SlackPrefixを入力','class'=>'col-md-4','id'=>'slack_prefix']) }}
            @error('slack_prefix')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('clientName','顧客名',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('clientName',$item->clientName,['placeholder'=>'顧客名を入力','class'=>'col-md-4','id'=>'clientName']) }}
            @error('clientName')
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
