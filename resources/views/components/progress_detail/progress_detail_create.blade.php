@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnLinkButton',['item'=>'/dev_confirm/'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">課題詳細</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'progress_detail.store']) }}
            {{ Form::hidden('fstSystemProgressId',$fstSystemProgressId) }}
            <div class="form-group">
              {{ Form::textarea('fstSystemPlanDetail',null,['placeholder'=>'課題詳細を入力','class'=>'col-md-4','id'=>'fstSystemPlanDetail']) }}
              @error('fstSystemPlanDetail')
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
