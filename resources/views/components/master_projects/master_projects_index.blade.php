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
              <th style="width:80px">Slack<br>Prefix</th>
              <th style="width:80px">契約形態</th>
              <th>顧客名</th>
              <th>案件名</th>
              <th style="width:80px">チーム</th>
              <th style="width:100px">開始日</th>
              <th style="width:100px">終了日</th>
              <th class="small" style="width:120px">(チャンネル名)</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                @if($item->client->slack_prefix)
                  {{ '#'.$item->client->sl_prefix }}
                @endif
              </td>
              <td>{{$item->contractType->contractType}}</td>
              <td><a href="{{asset('/clients_detail?id=')}}{{$item->clientId}}">{{$item->client->clientName}}</td>
              <td><a href="{{asset('/file_posts?id=')}}{{$item->projectId}}">{{$item->projectName}}</td>
              <td>
                @if(null !== ($item->workingTeam))
                  {{$item->workingTeam->workingTeam}}
                @endif
              </td>
              <td>{{$item->startDate}}</td>
              <td>{{$item->endDate}}</td>
              <td class="small">{{$item->slack_channel_name}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center align-middle">
          {{ $items->onEachSide(2)->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
