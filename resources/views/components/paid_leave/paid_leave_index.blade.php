@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col h5">
                    有給取得確認
                </div>
                <div class="col text-right">
                    <a href="{{route('paid_leave.create')}}"><div class="btn btn-sm btn-primary">取得日の更新</div></a>
                </div>
            </div>
        </div>

        <table class="table table-sm">
          <thead>
            <tr>
              <th style="width:20%;">名前</th>
              <th style="width:30%;">有給付与日</th>
              <th style="width:50%;">有給消化状況</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
              @if($item->role != '1' && isset($item->dispPaidLeave))
                <tr>
                    <td rowspan="2">{{ $item->employee->name }}</td>
                    <td>{{ $paidLeave[$item->userId][0] }}</td>
                    <td>{{ $paidLeave[$item->userId][1] }}</td>
                </tr>
                <tr>
                    <td>{{ $paidLeave[$item->userId][2] }}</td>
                    <td>{{ $paidLeave[$item->userId][3] }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection
