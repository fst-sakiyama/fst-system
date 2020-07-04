@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>顧客一覧</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/master_clients/create')}}"><button type="button" class="w-50 btn btn-primary">顧客一覧 | 新規登録</button></a>
            </div>
          </div>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th>コード</th>
              <th>顧客名</th>
              <th>契約開始日</th>
              <th>契約終了日</th>
              <th>修正</th>
              <th>削除</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>@php echo "C".($item->clientId + 1000) @endphp</td>
              <td><a href="{{asset('/clients_detail?id=')}}{{$item->clientId}}">{{$item->clientName}}</td>
              <td>{{$item->contractStartDate}}</td>
              <td>{{$item->contractEndDate}}</td>
              <td><a href="{{ route('master_clients.edit',$item->clientId) }}" class="btn btn-success btn-sm">修正</a></td>
              <td>
                <form action="{{ route('master_clients.destroy', $item->clientId) }}" id="form_{{ $item->clientId }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $item->clientId }}" class="btn btn-danger deleteConf btn-sm">削除</a>
                </form>
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
