@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">顧客一覧</div>
        <table class="table">
          <thead>
            <tr>
              <th class="col-1">コード</th>
              <th class="col-5">顧客名</th>
              <th class="col-3">契約開始日</th>
              <th class="col-3">契約終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td class="col-1">@php echo "C".($item->clientId + 1000) @endphp</td>
              <td class="col-5"><a href="{{asset('/clients-detail?id=')}}{{$item->clientId}}">{{$item->clientName}}</td>
              <td class="col-3">{{$item->contractStartDate}}</td>
              <td class="col-3">{{$item->contractEndDate}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
      {{ $items->links() }}
    </div>
  </div>
</div>

@endsection
