@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnLinkButton',['item'=>'/dev_confirm/'])</h1>
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
            <div class="card">
              <div class="card-body h-100">
              @empty($item->doComp)
                <img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/brownCat.png' ) }}" width="">
                <div class="card-img-overlay">
                  <h6 class="card-title mb-3">
                    更新時刻：{{ $item->updated_at->format('Y年m月d日 H時i分') }}
                  </h6>
                  <p class="card-text">
                    {!! nl2br(e($item->fstSystemPlanDetail)) !!}
                  </p>
                  <div class="row d-flex mb-2">
                    <div class="ml-2">
                      <a href="{{ route('progress_detail.editDoComp',['id'=>$item->fstSystemProgressDetailId,'fstSystemProgressId'=>$item->fstSystemProgressId]) }}" class="btn btn-primary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
                    </div>
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
              @else
                <img class="img-fluid mx-auto d-block" alt='済' src="{{ asset( 'images/doComp.png' ) }}" width="">
                <div class="card-img-overlay">
                  <h6 class="card-title mb-3">
                    完了時刻：{{ $item->doComp->format('Y年m月d日 H時i分') }}
                  </h6>
                  <p class="card-text">
                    {!! nl2br(e($item->fstSystemPlanDetail)) !!}
                  </p>
                </div>
              @endempty
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
