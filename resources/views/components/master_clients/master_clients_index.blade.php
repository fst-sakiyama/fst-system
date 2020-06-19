@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">顧客一覧</h5>
        <table class="table">
          <thead>
            <tr>
              <th>コード</th>
              <th>顧客名</th>
              <th>契約開始日</th>
              <th>契約終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>@php echo "C".($item->clientId + 1000) @endphp</td>
              <td><a href="{{asset('/clients_detail?id=')}}{{$item->clientId}}">{{$item->clientName}}</td>
              <td>{{$item->contractStartDate}}</td>
              <td>{{$item->contractEndDate}}</td>
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
