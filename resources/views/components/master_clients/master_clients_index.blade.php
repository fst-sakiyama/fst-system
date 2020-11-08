@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>顧客一覧</h5>
            </div>
            @can('sales-only')
            <div class="col-md text-right">
              <a href="{{asset('/master_clients/create')}}"><button type="button" class="w-50 btn btn-primary">顧客 | 新規</button></a>
            </div>
            @endcan
          </div>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th style="width:40%;">顧客名</th>
              <th style="width:10%;">Slack<br>prefix</th>
              <th style="width:20%;">Slack<br>表記</th>
              @can('sales-only')
              <th style="width:15%;">修正</th>
              <th style="width:15%;">削除</th>
              @endcan
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr data-href="{{asset('/clients_detail?id=')}}{{$item->clientId}}" style="cursor:pointer;">
              <td>{{$item->clientName}}</td>
              <td>
                @if($item->slack_prefix)
                  {{ '#'.$item->sl_prefix }}
                @endif
              </td>
              <td>
                @if($item->slack_abbreviated)
                  {{ $item->slack_abbreviated }}
                @endif
              </td>
              @can('sales-only')
              <td><a href="{{ route('master_clients.edit',$item->clientId) }}" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
              <td>
                <form action="{{ route('master_clients.destroy', $item->clientId) }}" id="form_{{ $item->clientId }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $item->clientId }}" class="btn btn-danger deleteConf btn-sm py-0"><i class="fas fa-trash-alt"></i> 削除</a>
                </form>
              </td>
              @endcan
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
