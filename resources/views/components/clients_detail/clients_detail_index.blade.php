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
              <th>開始日</th>
              <th>終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>@php echo 'P'.($item->projectId + 1000) @endphp</td>
              <td>{{$item->contractType->contractType}}</td>
              <td><a href="{{asset('/file_posts?id=')}}{{$item->projectId}}">{{$item->projectName}}</td>
              <td>{{$item->startDate}}</td>
              <td>{{$item->endDate}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
