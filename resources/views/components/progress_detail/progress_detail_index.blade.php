@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $fstSystemPlan->fstSystemPlan }} | 課題詳細</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/clients_detail/create')}}"><button type="button" class="w-50 btn btn-primary">| 新規登録</button></a>
            </div>
          </div>
        </div>
        @foreach($items as $item)
          <div class="col-md mt-3">
            {{ $item->fstSystemPlanDetail }}
          </div>
        @endforeach
        <div class="card-footer d-flex justify-content-center align-middle">
          テスト中
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
