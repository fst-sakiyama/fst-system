@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $fstSystemPlan->fstSystemPlan }}</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/progress_detail/create?id=')}}{{ $fstSystemPlan->fstSystemProgressId }}"><button type="button" class="w-50 btn btn-primary">課題詳細 | 新規登録</button></a>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($items as $item)
          <div class="col-sm-4">
            <div class="card card-body">
              <p class="card-text">
                {{ $item->fstSystemPlanDetail }}
              </p>
              <div class="row mt-3 d-flex">
                <div class="mr-2 ml-auto">
                  <a href="{{ route('progress_detail.edit',$item->fstSystemProgressDetailId) }}" class="btn btn-success btn-sm">修正</a>
                </div>
                <div class="mr-2">
                  {{Form::open(['route'=>['progress_detail.destroy',$item->fstSystemProgressDetailId],'method'=>'DELETE','id'=>'form_'.$item->fstSystemProgressDetailId])}}
                  {{Form::submit('削除',['class' => 'btn btn-danger btn-sm deleteConf','data-id'=>$item->fstSystemProgressDetailId])}}
                  {{Form::close()}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="card-footer text-right">
					<small class="text-mute">{{ $fstSystemPlan->fstSystemPlan }}</small>
				</div>
      </div>
    </div>
  </div>
</div>

@endsection
