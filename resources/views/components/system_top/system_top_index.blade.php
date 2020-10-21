@section('content')

@php
  $todayDate = Carbon\Carbon::now();
  $classification = array('','【共通】','','【経理】','','【営業】','','【開発】','','【運用】');
@endphp

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>利用方法について</h3>
        <div  class="row mt-3 ml-1">
          <div class="col">
            <a href="{{ route('top_information.create') }}">
              <div class="btn btn-sm btn-warning">新規登録</div>
            </a>
          </div>
        </div>
        @foreach($fstSystemInformation as $item)
            <div class="row mt-3 ml-1">
              <div class="col-9">
                <li>
                  {{ $classification[$item->classification] }}<a href="{{ route('file_infoShow.infoShow',['id'=>$item->id]) }}" target="topinfo" class="h6">{{ $item->information }}（{{ $item->fileName}}）</a>
                </li>
              </div>
              <div class="col-3 clearfix">
                <div class="float-right">
                  <a href="{{ route('top_information.edit',[$item->id]) }}" class="btn btn-sm btn-primary py-0">修正</a>
                  <div class="btn btn-sm btn-danger py-0">削除</div>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>最近の更新情報</h3>
        <div class="row mt-3">
          <div class="col">
          @foreach($progressDetails as $item)
          <div class="row mt-2 ml-1">
            <div class="col-md-2">
              @php
                $doComp = $item->doComp;
              @endphp
              {{ $doComp->format('Y-m-d') }}
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  {{ $item->progress->fstSystemPlan }}
                  @if($doComp->diffInWeeks($todayDate)<=2)
                    <img class="" alt='新規' src="{{ asset( 'images/new.png' ) }}" width="50px">
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                  {{ $item->fstSystemPlanDetail }}<br>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col d-flex justify-content-center align-middle">
          {{ $progressDetails->onEachSide(2)->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>要望板</h3>
        <div class="row mt-3 ml-1">
          <div class="col">
            バグ報告や機能修正のリクエスト、機能追加のリクエストは、<a href="{{ asset('/system_top/create') }}" class="h5">こちら</a>からご報告ください。<br>
            リクエストいただいたもので既に完了したものの一覧は<a href="{{ route('system_top.doCompShow') }}" class="h5">こちら</a>からご確認いただけます。
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
