@section('content')

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">案件一覧</div>
        <table class="table">
          <thead>
            <tr>
              <th class="d-none">ID</th>
              <th class="col-1">コード</th>
              <th class="col-3">顧客名</th>
              <th class="col-3">案件名</th>
              <th class="col-2">チーム名</th>
              <th class="col-1">契約開始日</th>
              <th class="col-1">契約終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td class="d-none">{{$item->projectId}}</td>
              <td class="col-1">@php echo "P".($item->projectId + 1000) @endphp</td>
              <td class="col-3">{{$item->clientName}}</td>
              <td class="col-3">{{$item->projectName}}</td>
              <td class="col-2">{{$item->teamName}}</td>
              <td class="col-1">{{$item->contractStartDate}}</td>
              <td class="col-1">{{$item->contractEndDate}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
