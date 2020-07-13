@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnLinkButton',['item'=>'/progress_detail'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">課題詳細修正</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(array('route' => array('progress_detail.update', $item->fstSystemProgressDetailId), 'method' => 'PUT')) }}
            {{ Form::hidden('fstSystemProgressId',$item->fstSystemProgressId) }}
            <div class="form-group">
              {{ Form::textarea('fstSystemPlanDetail',$item->fstSystemPlanDetail,['placeholder'=>'課題詳細を入力','class'=>'col-md-4','id'=>'fstSystemPlanDetail']) }}
              @error('fstSystemPlanDetail')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('修正実行',['class'=>'w-25 btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
