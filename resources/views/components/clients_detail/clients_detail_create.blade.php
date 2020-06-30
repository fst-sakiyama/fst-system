@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'clients_detail.store']) }}
            <div class="form-group">
              {{ Form::label('projectName','案件名',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::text('projectName',null,['placeholder'=>'案件名を入力','class'=>'col-md-4','id'=>'projectName']) }}
              @error('projectName')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::label('startDate','開始日',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::date('startDate',null,['class'=>'col-md-4','id'=>'startDate']) }}
            </div>
            <div class="form-group">
              {{ Form::label('endDate','完了日',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              {{ Form::date('endDate',null,['class'=>'col-md-4','id'=>'endDate']) }}
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
