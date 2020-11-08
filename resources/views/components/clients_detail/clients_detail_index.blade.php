@section('content')

@php
  $clientName = $clientName->clientName;
  $clientName_str = mb_substr($clientName,0,10);
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $clientName }} | 案件一覧</h5>
            </div>
          </div>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th style="width:10%;">契約形態</th>
              <th style="width:40%;">案件名</th>
              <th style="width:10%;">開始日</th>
              <th style="width:10%;">終了日</th>
              <th style="width:10%;">稼働</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr data-href="{{asset('/file_posts?id=')}}{{$item->projectId}}" style="cursor:pointer;">
              <td><img class="" alt="{{ $item->contractType }}" src="{{ asset( 'images/'.$item->contractType->contractTypeImage ) }}" width="40px"></td>
              <td>{{$item->projectName}}</td>
              <td>{{$item->startDate}}</td>
              <td>{{$item->endDate}}</td>
              <td>
                @foreach($item->teamProjects as $workingTeam)
                  <img class="" alt="{{ $workingTeam->workingTeam->workingTeam }}" src="{{ asset( 'images/'.$workingTeam->workingTeam->workingTeamImage ) }}" width="40px">
                @endforeach
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center align-middle">

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
