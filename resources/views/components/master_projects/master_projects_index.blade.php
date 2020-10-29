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
              <th>Slack<br>Prefix</th>
              <th>契約形態</th>
              <th>顧客名</th>
              <th>案件名</th>
              <th>開始日</th>
              <th>終了日</th>
              <th>チーム</th>
              <th class="small">(チャンネル名)<th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                @if(null !== ($item->client->slack_prefix))
                  {{ $item->client->slack_prefix }}
                @endif
              </td>
              <td>{{$item->contractType->contractType}}</td>
              <td><a href="{{asset('/clients_detail?id=')}}{{$item->clientId}}">{{$item->client->clientName}}</td>
              <td><a href="{{asset('/file_posts?id=')}}{{$item->projectId}}">{{$item->projectName}}</td>
              <td>{{$item->startDate}}</td>
              <td>{{$item->endDate}}</td>
              <td>
                @if(null !== ($item->workingTeam))
                  {{$item->workingTeam->workingTeam}}
                @endif
              </td>
              <td class="small">{{$item->slack_channel_name}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
