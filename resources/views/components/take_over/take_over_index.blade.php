@section('content')

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <h5 class="card-header">@php echo date("Y/m/d"); @endphp</h5>
        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="takeOver-tab" data-toggle="tab" href="#takeOver" role="tab" aria-controls="takeOver">引継ぎ事項</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wellKnown-tab" data-toggle="tab" href="#wellKnown" role="tab" aria-controls="wellKnown">周知事項</a>
              </li>
            </ul>
          </div>
          <div class="col d-flex justify-content-end align-self-center mr-5">
            <a href="{{asset('/take_over/create') }}"><button type="button" class="btn btn-primary">新規登録</button></a>
          </div>
        </div>
        <div class="tab-content" id="myTab-content">
          <div class="tab-pane fade show active" id="takeOver" role="tabpanel" aria-labelledby="takeOver-tab">
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
                        {{ $item->takeOverContent }}
                      </p>
                      <div class="row d-flex mb-2">
                        <div class="ml-2">
                          <a href="{{ route('progress_detail.editDoComp',['id'=>$item->projectId,'takeOverId'=>$item->takeOverId]) }}" class="btn btn-primary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
                        </div>
                        <div class="mr-2 ml-auto">
                          <a href="{{ route('progress_detail.edit',$item->projectId) }}" class="btn btn-success btn-sm">修正</a>
                        </div>
                        <div class="mr-2">
                          {{Form::open(['route'=>['progress_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
                          {{Form::submit('削除',['class' => 'btn btn-danger btn-sm deleteConf','data-id'=>$item->projectId])}}
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
                        {{ $item->takeOverContent }}
                      </p>
                    </div>
                  @endempty
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-right">
              <small class="text-mute">タブ1枚目</small>
            </div>
          </div>
          <div class="tab-pane fade" id="wellKnown" role="tabpanel" aria-labelledby="wellKnown-tab">
            2枚目のタブ<br>
            2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ2枚目のタブ<br>
            <div class="card-footer text-right">
              <small class="text-mute">タブ2枚目</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
