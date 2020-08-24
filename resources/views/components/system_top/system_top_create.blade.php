@section('content')

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>要望板</h3>
        <div class="row mt-3 ml-1">
          <div class="col">
            あああ
          </div>
        </div>
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border border-danger">
              デンジャーテスト
            </div>
          </div>
        </div>
        <div class="row mt-2 mr-1 justify-content-end">
          <div class="col-md-8">
            <div class="border border-success">
              回答テスト
            </div>
          </div>
        </div>
        <div class="row mt-5 justify-content-center">
          <div class="col-md-10">
            {{ Form::open(['route'=>'system_top.store']) }}
            <div class="form-group">
              {{ Form::select('requestClassificationId',$masterRequestClassifications,old('requestClassificationId'),['placeholder'=>'---分類を選択---','class'=>'col-md-4']) }}
              @error('requestClassificationId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::textarea('request','',['class'=>'form-control','rows'=>'3']) }}
              @error('request')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group text-center">
              {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary']) }}
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
