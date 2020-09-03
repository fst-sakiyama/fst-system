@section('content')

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col">
            <h3>@include('components.returnLinkButton',['item'=>'/system_top/'])　要望板</h3>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col">
            出来るだけ詳細に記載していただくと助かります。<br>
            リクエストいただいたもので既に完了したものの一覧は<a href="{{ asset('/system_top/docomp_show') }}" class="h5">こちら</a>からご確認いただけます。
          </div>
        </div>
        <div class="row ml-5">
          <div class="col">
            <div class="row mt-3 ml-1">
              <div class="col">
                @foreach($requestClassifications as $item)
                  <div class="row mt-1">
                    <div class="col">
                      <img class="" alt="{{ $item->requestClassification}}" src="{{ asset( 'images/'.$item->requestImage ) }}" width="70px">
                      ・・・{{ $item->explanation }}
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @foreach($items as $item)
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border p-1 {{ $item->requestClassification->requestColorClass }}">
              <div class="row ml-1 d-flex justify-content-between">
                <div class="col-6 align-self-center">
                  <img class="" alt="{{ $item->requestClassification->requestClassification}}" src="{{ asset( 'images/'.$item->requestClassification->requestImage ) }}" width="70px">
                  <span class="ml-2">{{ $item->created_at->format('Y-m-d') }}</span>
                </div>
                <div class="col-2">
                  {{Form::open(['route'=>['system_top.requestDestroy',$item->fstSystemRequestPlateId],'method'=>'DELETE','id'=>'form_'.$item->fstSystemRequestPlateId])}}
                  {{Form::submit('削除',['class' => 'btn btn-danger btn-sm p-1 deleteConf','data-id'=>$item->fstSystemRequestPlateId])}}
                  {{Form::close()}}
                </div>
              </div>
              <div class="row mt-1 ml-1 d-flex">
                <div class="col-10">
                  {!! nl2br(e($item->requestMessage)) !!}
                </div>
                @php $length = count($item->replyToRequests); @endphp
                <div class="col-2 align-self-end">
                @if($length==0)
                  <a href="{{ route('system_top.edit',$item->fstSystemRequestPlateId) }}" class="btn btn-success btn-sm p-1">返信</a>
                @else
                  <small><a id="reply_{{$item->fstSystemRequestPlateId}}" class="openReply text-primary" style="cursor:pointer;">返信を開く...</a></small>
                @endif
                </div>
              </div>
              @empty(!($item->created_by))
                <div class="row ml-1">
                  <div class="col-10">
                    <div class="small">
                      作成者：{{ app\User::find($item->created_by)->name }}
                    </div>
                  </div>
                </div>
              @endempty
            </div>
          </div>
          <div class="col align-self-center">
            <a href="{{ route('system_top.editDoComp',$item->fstSystemRequestPlateId) }}" class="btn btn-secondary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
          </div>
        </div>
          @php $cnt=1; @endphp
          @foreach($item->replyToRequests as $reply)
          <div class="row mt-2 ml-5 addReply reply_{{$item->fstSystemRequestPlateId}}" style="display:none;">
            <div class="col-md-10">
              <div class="border p-1 border-success">
                <div class="row ml-1 d-flex justify-content-between">
                  <div class="col-6 align-self-center">
                    <img class="" alt="返信" src="{{ asset( 'images/reply.png' ) }}" width="70px">
                    <span class="ml-2">{{ $reply->created_at->format('Y-m-d') }}</span>
                  </div>
                </div>
                <div class="row mt-1 ml-1 d-flex">
                  <div class="col-10">
                    {!! nl2br(e($reply->reply)) !!}
                  </div>
                  @if($length===$cnt)
                  <div class="col-2 align-self-end">
                    <a href="{{ route('system_top.edit',$item->fstSystemRequestPlateId) }}" class="btn btn-success btn-sm p-1">返信</a>
                  </div>
                  @endif
                </div>
                @empty(!($reply->created_by))
                  <div class="row ml-1">
                    <div class="col-10">
                      <div class="small">
                        作成者：{{ app\User::find($reply->created_by)->name }}
                      </div>
                    </div>
                  </div>
                @endempty
              </div>
            </div>
          </div>
          @php $cnt++; @endphp
          @endforeach
        @endforeach
        <div class="row mt-5 justify-content-center">
          <div class="col-md-10">
            {{ Form::open(['route'=>'system_top.store']) }}
            <div class="form-group">
              {{ Form::select('requestClassificationId',$masterRequestClassifications,old('requestClassificationId'),['placeholder'=>'---分類を選択---','class'=>'col-md-4']) }}
              @error('requestClassificationId')
                <br><span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              {{ Form::textarea('requestMessage','',['class'=>'form-control','rows'=>'3','placeholder'=>'出来るだけ詳細に記入してください']) }}
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
