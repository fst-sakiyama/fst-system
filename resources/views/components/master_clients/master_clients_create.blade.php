@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">顧客一覧</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'master_clients.store']) }}
            <div class="form-group">
              {{ Form::label('clientCode','顧客コード',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::text('clientCode',null,['placeholder'=>'顧客コードを入力','class'=>'col-md-4','id'=>'clientCode']) }}
              @error('clientCode')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('clientName','顧客名',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::text('clientName',null,['placeholder'=>'顧客名を入力','class'=>'col-md-4','id'=>'clientName']) }}
              @error('clientName')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('clientNameKana','顧客名かな',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::text('clientNameKana',null,['placeholder'=>'よみをひらがなで入力','class'=>'col-md-4','id'=>'clientName']) }}
              @error('clientNameKana')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('contractStartDate','契約開始日',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::date('contractStartDate',null,['class'=>'col-md-4','id'=>'contractStartDate']) }}
            </div>
            <div class="form-group">
              {{ Form::label('contractEndDate','契約完了日',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::date('contractEndDate',null,['class'=>'col-md-4','id'=>'contractEndDate']) }}
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
