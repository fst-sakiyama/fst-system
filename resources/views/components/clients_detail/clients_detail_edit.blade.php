@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('clients_detail.update', $item->clientId), 'method' => 'PUT')) }}
          {{ Form::hidden('clientId', $item->clientId) }}
          <div class="form-group">
            {{ Form::label('clientName','顧客名',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('clientName',$item->clientName,['placeholder'=>'顧客名を入力','class'=>'col-md-4','id'=>'clientName']) }}
            @error('clientName')
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
