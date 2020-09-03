@section('content')

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col">
            <h3>@include('components.returnButton')　要望板｜完了済</h3>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col">
            要望板にてリクエストのあった内容のうち作業が完了したものです。
          </div>
        </div>
        @foreach($items as $item)
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border p-1 {{ $item->requestClassification->requestColorClass }}">
              <div class="row ml-1 d-flex justify-content-between">
                <div class="col-6 align-self-center">
                  <img class="" alt="{{ $item->requestClassification->requestClassification}}" src="{{ asset( 'images/'.$item->requestClassification->requestImage ) }}" width="70px">
                  <span class="ml-2">{{ $item->doComp->format('Y-m-d') }}</span>
                </div>
              </div>
              <div class="row mt-1 ml-1 d-flex">
                <div class="col-10">
                  {!! nl2br(e($item->requestMessage)) !!}
                </div>
                @php $length = count($item->replyToRequests); @endphp
                <div class="col-2 align-self-end">
                @if($length > 0)
                  <small><a id="reply_{{$item->fstSystemRequestPlateId}}" class="openReply text-primary" style="cursor:pointer;">返信を開く...</a></small>
                @endif
                </div>
              </div>
            </div>
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
                </div>
              </div>
            </div>
          </div>
          @php $cnt++; @endphp
          @endforeach
        @endforeach
        <div class="row mt-5">
          <div class="col d-flex justify-content-center align-middle">
            {{ $items->onEachSide(2)->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
