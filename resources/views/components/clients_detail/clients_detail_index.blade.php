@section('content')

@php
  $clientName = $clientName->clientName;
  $clientName_str = mb_substr($clientName,0,10);
@endphp

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $clientName }} | 案件一覧</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/clients_detail/create')}}"><button type="button" class="w-50 btn btn-primary">{{ $clientName_str }} | 新規登録</button></a>
            </div>
          </div>
        </div>
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
