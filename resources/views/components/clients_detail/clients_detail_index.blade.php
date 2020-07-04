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
              <a href="{{asset('/clients_detail/create?id=')}}{{$clientId}}"><button type="button" class="w-50 btn btn-primary">{{ $clientName_str }} | 新規登録</button></a>
            </div>
          </div>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th>コード</th>
              <th>契約形態</th>
              <th>案件名</th>
              <th>開始日</th>
              <th>終了日</th>
              <th>修正</th>
              <th>削除</th>
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
              <td><a href="{{ route('clients_detail.edit',$item->projectId) }}" class="btn btn-success btn-sm">修正</a></td>
              <td>
                {{Form::open(['route'=>['clients_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])}}
                {{Form::submit('削除',['class' => 'btn btn-danger btn-sm deleteConf','data-id'=>$item->projectId])}}
                {{Form::close()}}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center align-middle">
          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
