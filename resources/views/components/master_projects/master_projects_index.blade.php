@section('content')

@php
  $i=1;
  $length = count($contractTypes);
@endphp

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>

        @foreach($contractTypes as $contractType)
          @if($i === 1)
            <div class="row">
              <div class="col">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
          @endif
                  <li class="nav-item">
                    <a class="nav-link @if($i === 1) active @endif" id="item{{$contractType->contractTypeId}}-tab" data-toggle="tab" href="#item{{$contractType->contractTypeId}}" role="tab" aria-controls="item{{$contractType->contractTypeId}}">{{ $contractType->contractType }}</a>
                  </li>
          @if($i === $length)
                </ul>
              </div>
            </div>
          @endif
          @php $i++; @endphp
        @endforeach

        @php $i=1; $prevId=null @endphp

        @foreach($contractTypes as $contractType)
          @if($i === 1)
            <div class="tab-content" id="myTab-content">
          @endif
              <div class="tab-pane fade @if($i === 1) show active @endif" id="item{{$contractType->contractTypeId}}" role="tabpanel" aria-labelledby="item{{$contractType->contractTypeId}}-tab">
                <div class="row">
                  <div class="col">

                    <div class="card">

                        <table class="table table-sm table-hover" style="table-layout:fixed;">
                          <thead>
                            <th style="width:60px;">チーム</th>
                            <th style="width:240px;">案件名</th>
                            <th style="width:80px;">開始日</th>
                            <th style="width:80px;">完了日</th>
                            <th style="width:100px;">チャンネル名</th>
                          </thead>
                          <tbody>
                          @foreach($items[$contractType->contractTypeId] as $item)
                            @php $nowId = $item->project->clientId; @endphp
                            @if(is_null($prevId) || $item->project->clientId !== $prevId)
                              <tr>
                                <td colspan="5" class="table-dark h5"><a href="{{asset('/clients_detail?id=')}}{{$item->project->clientId}}">{{$item->project->client->clientName}}</a></td>
                              </tr>
                            @endif
                              <tr data-href="{{ asset('/file_posts?id=')}}{{$item->teamProjectId}}" style="cursor:pointer;">
                                <td class="text-center">{{ $item->workingTeam->workingTeam }}</td>
                                <td>{{ $item->project->projectName }}</td>
                                <td>{{ $item->project->startDate }}</td>
                                <td>{{ $item->project->endDate }}</td>
                                <td>{{ $item->slack_channel_name }}</td>
                              </tr>
                            @php $prevId = $nowId; @endphp
                          @endforeach
                          </tbody>
                        </table>

                    </div>

                  </div>
                </div>
              </div>

          @if($i === $length)
            </div>
          @endif
          @php $i++; @endphp
        @endforeach




        <div class="card-footer d-flex justify-content-center align-middle">
          テスト
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
