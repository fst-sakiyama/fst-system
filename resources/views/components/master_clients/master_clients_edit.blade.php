@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnLinkButton',['item'=>'/master_clients'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">顧客一覧</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('master_clients.update', $item->clientId), 'method' => 'PUT')) }}
          {{ Form::hidden('clientId', $item->clientId) }}
          <div class="form-group">
            {{ Form::label('clientCode','顧客コード',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('clientCode',$item->clientCode,['placeholder'=>'顧客コードを入力','class'=>'col-md-4','id'=>'clientCode']) }}
            @error('clientCode')
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
          <div class="form-group">
            {{ Form::label('clientNameKana','顧客名かな',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('clientNameKana',$item->clientNameKana,['placeholder'=>'よみをひらがなで入力','class'=>'col-md-4','id'=>'clientName']) }}
            @error('clientNameKana')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('contractStartDate','契約開始日',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::date('contractStartDate',$item->contractStartDate,['class'=>'col-md-4','id'=>'contractStartDate']) }}
          </div>
          <div class="form-group">
            {{ Form::label('contractEndDate','契約完了日',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::date('contractEndDate',$item->contractEndDate,['class'=>'col-md-4','id'=>'contractEndDate']) }}
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
