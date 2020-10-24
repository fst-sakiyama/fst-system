@section('content')

@php
  $todayDate = Carbon\Carbon::now();
  $classification = array('','【共通】','【共通：管理者】','【経理】','【経理：管理者】','【営業】','【営業：管理者】','【開発】','【開発：管理者】','【運用】','【運用：管理者】');
  $gate = array('','user-higher','admin-higher','account-only','admin-higher','sales-only','admin-higher','dev-only','admin-higher','ope-only','admin-higher');
@endphp

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>利用方法について</h3>
        @can('system-only')
        <div  class="row mt-3 ml-1">
          <div class="col">
            <a href="{{ route('top_information.create') }}">
              <div class="btn btn-sm btn-warning">新規登録</div>
            </a>
          </div>
        </div>
        @endcan

        <div class="mt-3">
        @foreach($fstSystemInformation as $item)
            <div class="row mt-1 ml-1">
              <div class="col">
                        @can($gate[$item->classification])
                <li>
                  {{ $classification[$item->classification] }}
                  @empty($item->fileName)
                    {{ $item->information }}
                  @else
                    <a href="{{ route('file_infoShow.infoShow',['id'=>$item->id]) }}" target="topinfo" class="h6">{{ $item->information }}（{{ $item->fileName}}）</a>
                  @endempty
                </li>
                @endcan
              </div>
              @can('system-only')
              <div class="col-3 clearfix">
                <div class="float-right">
                  <a href="{{ route('top_information.edit',[$item->id]) }}" class="btn btn-sm btn-primary py-0">修正</a>
                  {{ Form::open(['route'=>['top_information.destroy',$item->id],'method'=>'DELETE']) }}
                  {{ Form::submit('削除',['class' => 'btn btn-danger btn-sm py-0','onclick'=>"return confirm('本当に削除して良いですか？')"]) }}
                  {{ Form::close() }}
                </div>
              </div>
              @endcan
            </div>
        @endforeach
        </div>
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
