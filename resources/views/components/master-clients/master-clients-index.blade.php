@section('content')

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">顧客一覧</div>
        <table class="table">
          <thead>
            <tr>
              <th class="d-none">ID</th>
              <th class="col-1">コード</th>
              <th class="col-5">顧客名</th>
              <th class="col-3">contractStartDate</th>
              <th class="col-3">contractEndDate</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td class="d-none">{{$item->clientId}}</td>
              <td class="col-1">@php echo "C".($item->clientId + 1000) @endphp</td>
              <td class="col-5">{{$item->clientName}}</td>
              <td class="col-3">{{$item->contractStartDate}}</td>
              <td class="col-3">{{$item->contractEndDate}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
