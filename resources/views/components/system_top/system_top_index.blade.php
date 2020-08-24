@section('content')

@php
  $todayDate = Carbon\Carbon::now();
@endphp

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>利用方法について</h3>
        <div class="row mt-3 ml-1">
          <div class="col">
            利用方法PDF版はこちら。（ブラウザで表示されます）<br>
            利用方法ダウンロード版（Word）はこちら。
          </div>
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
              {{ $item->doComp->format('Y-m-d') }}
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  {{ $item->progress->fstSystemPlan }}
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
          {{ $progressDetails->links() }}
        </div>
      </div>
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>要望板</h3>
        <div class="row mt-3 ml-1">
          <div class="col">
            バグ報告や機能修正の要望、機能追加の要望は、<a href="{{ asset('/system_top/create') }}" class="h5">こちら</a>からご報告ください。
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
