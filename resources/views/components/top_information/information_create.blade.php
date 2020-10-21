@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">インフォメーション新規</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'top_information.store','enctype'=>'multipart/form-data', 'method' => 'POST']) }}

            <div class="form-group mt-3 form-inline">
              {{ Form::label('classification','分類',['class'=>'col-md-2']) }}
              {{ Form::select('classification',Config::get('array.informations'),null,['class'=>'custom-select custom-select-sm']) }}
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('information','表示内容',['class'=>'col-md-2']) }}
              {{ Form::textarea('information',null,['class'=>'form-control col-md-6','rows'=>3,'required']) }}
            </div>

            <div class="form-group mt-5 form-inline">
              {{ Form::label('filePosts','添付ファイル',['class'=>'col-md-2']) }}
              <div class="input-group col-md-6">
                  <div class="custom-file">
                      {{ Form::file('file',['class'=>'custom-file-input','id'=>'customFile','name'=>'file','required']) }}
                      {{ Form::label('file','ファイル選択...',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
                  </div>
                  <div class="input-group-append">
                      {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
                  </div>
              </div>
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
