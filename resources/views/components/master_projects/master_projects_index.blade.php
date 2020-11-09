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
                <ul class="nav nav-tabs nav-fill nav-pills" id="myTab" role="tablist">
          @endif
                  <li class="nav-item">
                    <a class="nav-link @if($i === 1) active @endif" id="item{{$contractType->contractTypeId}}-tab" data-toggle="tab" href="#item{{$contractType->contractTypeId}}" role="tab" aria-controls="item{{$contractType->contractTypeId}}">
                      <img class="" alt="{{ $contractType->contractType }}" src="{{ asset( 'images/'.$contractType->contractTypeImage ) }}" width="70px">
                    </a>
                  </li>
          @if($i === $length)
                </ul>
              </div>
            </div>
          @endif
          @php $i++; @endphp
        @endforeach

        @php $i=1; $prevId=null; @endphp

        @foreach($contractTypes as $contractType)
          @if($i === 1)
            <div class="tab-content" id="myTab-content">
          @endif
              <div class="tab-pane fade @if($i === 1) show active @endif" id="item{{$contractType->contractTypeId}}" role="tabpanel" aria-labelledby="item{{$contractType->contractTypeId}}-tab">
                <div class="row">
                  <div class="col">

                    <div class="card">

                        <table class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th style="width: 50%;">案件名</th>
                              <th style="width: 8%;">開始日</th>
                              <th style="width: 8%;">完了日</th>
                              <th style="width: 10%;">稼働</th>
                              @can('sales-only')
                              <th style="width:12%;">修正</th>
                              <th style="width:12%;">削除</th>
                              @endcan
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($items[$contractType->contractTypeId] as $item)
                            @php $nowId = $item->clientId; @endphp
                            @if(is_null($prevId) || $item->clientId !== $prevId)
                              <tr data-href="{{asset('/clients_detail?id=')}}{{$item->clientId}}" style="cursor:pointer;">
                                <td colspan="6" class="table-dark h5">
                                  <div class="row">
                                  <div class="col-10">{{$item->client->clientName}}</div>
                                  @can('sales-only')
                                  <div class="col-2 text-right"><a href="{{asset('/clients_detail/create?id=')}}{{$item->clientId}}"><button type="button" class="btn btn-primary btn-sm p-0">新規登録</button></a></div>
                                  @endcan
                                  </div>
                                </td>
                              </tr>
                            @endif
                              <tr data-href="{{ asset('/file_posts?id=')}}{{$item->projectId}}" style="cursor:pointer;">
                                <td>{{ $item->projectName }}</td>
                                <td>{{ $item->startDate }}</td>
                                <td>{{ $item->endDate }}</td>
                                <td>
                                    @foreach($item->teamProjects as $workingTeam)
                                      <img class="" alt="{{ $workingTeam->workingTeam->workingTeam }}" src="{{ asset( 'images/'.$workingTeam->workingTeam->workingTeamImage ) }}" width="40px">
                                    @endforeach
                                </td>
                                @can('sales-only')
                                <td><a href="{{ route('clients_detail.edit',$item->projectId) }}" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
                                <td>
                                  {{Form::open(['route'=>['clients_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
                                  {!! Form::button('<i class="fas fa-trash-alt"></i> 削除',['class' => 'btn btn-danger btn-sm deleteConf py-0','data-id'=>$item->projectId,'type'=>'submit']) !!}
                                  {{Form::close()}}
                                </td>
                                @endcan
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
