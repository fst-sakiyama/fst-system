@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th>コード</th>
              <th>顧客名</th>
              <th>契約形態</th>
              <th>案件名</th>
              <th>開始日</th>
              <th>終了日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                @php
                  if(null !== ($item->projectCode)){
                    echo 'P'.sprintf('%03d',$item->projectCode);
                  }
                @endphp
              </td>
              <td><a href="{{asset('/clients_detail?id=')}}{{$item->clientId}}">{{$item->client->clientName}}</td>
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
