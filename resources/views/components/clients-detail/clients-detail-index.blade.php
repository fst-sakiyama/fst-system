@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">{{ $clientName->clientName }}　様　案件一覧</h5>
        <table class="table">
          <thead>
            <tr>
              <th>コード</th>
              <th>契約形態</th>
              <th>案件名</th>
              <th>チーム名</th>
              <th>契約開始日</th>
              <th>契約終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>@php echo "P".($item->projectId + 1000) @endphp</td>
              <td>{{$item->typeOfContract}}</td>
              <td><a href="{{asset('/projects-detail?id=')}}{{$item->projectId}}">{{$item->projectName}}</td>
              <td>{{$item->teamName}}</td>
              <td>{{$item->contractStartDate}}</td>
              <td>{{$item->contractEndDate}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
