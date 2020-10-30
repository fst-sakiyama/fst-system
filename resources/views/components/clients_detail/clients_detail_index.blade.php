@section('content')

@php
  $clientName = $clientName->clientName;
  $clientName_str = mb_substr($clientName,0,10);
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnLinkButton',['item'=>'/master_projects'])</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $clientName }} | 案件一覧</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/clients_detail/create?id=')}}{{$clientId}}"><button type="button" class="w-50 btn btn-primary">{{ $clientName_str }} | 新規登録</button></a>
            </div>
          </div>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th style="width:80px">Slack<br>Prefix</th>
              <th style="width:80px">契約形態</th>
              <th>案件名</th>
              <th style="width:80px">チーム</th>
              <th style="width:100px">開始日</th>
              <th style="width:100px">終了日</th>
              <th class="small" style="width:120px">(チャンネル名)</th>
              <th>修正</th>
              <th>削除</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                @if(null !== ($item->client->slack_prefix))
                  {{ $item->client->sl_prefix }}
                @endif
              </td>
              <td>{{$item->contractType->contractType}}</td>
              <td><a href="{{asset('/file_posts?id=')}}{{$item->projectId}}">{{$item->projectName}}</td>
              <td>
                @if(null !== ($item->workingTeam))
                  {{$item->workingTeam->workingTeam}}
                @endif
              </td>
              <td>{{$item->startDate}}</td>
              <td>{{$item->endDate}}</td>
              <td class="small">{{$item->slack_channel_name}}</td>
              <td><a href="{{ route('clients_detail.edit',$item->projectId) }}" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
              <td>
                {{Form::open(['route'=>['clients_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
                {!! Form::button('<i class="fas fa-trash-alt"></i> 削除',['class' => 'btn btn-danger btn-sm deleteConf py-0','data-id'=>$item->projectId,'type'=>'submit']) !!}
                {{Form::close()}}
              </td>
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
