@section('content')

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col">
            <h3>@include('components.returnLinkButton',['item'=>'/system_top/create'])　返信作成</h3>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col">
            返信を作成する際も出来るだけ詳細に記載してください。
          </div>
        </div>
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border p-1 {{ $requestPlate->requestClassification->requestColorClass }}">
              <div class="row ml-1 d-flex justify-content-between">
                <div class="col-6 align-self-center">
                  <img class="" alt="{{ $requestPlate->requestClassification->requestClassification}}" src="{{ asset( 'images/'.$requestPlate->requestClassification->requestImage ) }}" width="60px">
                  <span class="ml-2">{{ $requestPlate->created_at->format('Y-m-d') }}</span>
                </div>
              </div>
              <div class="row mt-1 ml-1 d-flex">
                <div class="col-10">
                  {!! nl2br(e($requestPlate->requestMessage)) !!}
                </div>
              </div>
              @empty(!($requestPlate->created_by))
                <div class="row ml-1">
                  <div class="col-10">
                    <div class="small">
                      作成者：{{ userCheck($requestPlate->created_by) }}
                    </div>
                  </div>
                </div>
              @endempty
            </div>
          </div>
        </div>
          @foreach($requestPlate->replyToRequests as $reply)
          <div class="row mt-2 ml-5">
            <div class="col-md-10">
              <div class="border p-1 border-success">
                <div class="row ml-1 d-flex justify-content-between">
                  <div class="col-6 align-self-center">
                    <img class="" alt="返信" src="{{ asset( 'images/reply.png' ) }}" width="70px">
                    <span class="ml-2">{{ $reply->created_at->format('Y-m-d') }}</span>
                  </div>
                  <div class="col-2">
                    {{ Form::open(['route'=>['system_top.replyDestroy',$reply->fstSystemReplyToRequestId],'method'=>'DELETE','id'=>'form_'.$reply->fstSystemReplyToRequestId]) }}
                    {{ Form::submit('削除',['class' => 'btn btn-danger btn-sm p-1 deleteConf','data-id'=>$reply->fstSystemReplyToRequestId]) }}
                    {{ Form::close() }}
                  </div>
                </div>
                <div class="row mt-1 ml-1 d-flex">
                  <div class="col-10">
                    {!! nl2br(e($reply->reply)) !!}
                  </div>
                </div>
                @empty(!($reply->created_by))
                  <div class="row ml-1">
                    <div class="col-10">
                      <div class="small">
                        作成者：{{ userCheck($reply->created_by) }}
                      </div>
                    </div>
                  </div>
                @endempty
              </div>
            </div>
          </div>
          @endforeach
        <div class="row mt-5 justify-content-center">
          <div class="col-md-10">
            {{ Form::open(array('route' => array('system_top.update', $requestPlate->fstSystemRequestPlateId), 'method' => 'PUT')) }}
            {{ Form::hidden('fstSystemRequestPlateId',$requestPlate->fstSystemRequestPlateId) }}
            <div class="form-group">
              {{ Form::textarea('reply','',['class'=>'form-control','rows'=>'3','placeholder'=>'出来るだけ詳細に記入してください']) }}
              @error('reply')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group text-center">
              {{ Form::submit('返信送信',['class'=>'w-25 btn btn-primary']) }}
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
