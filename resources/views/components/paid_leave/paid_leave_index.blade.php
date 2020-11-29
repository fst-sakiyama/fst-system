@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">有給取得確認</h5>

        <table class="table table-sm table-hover">
          <thead>
            <tr>
              <th>名前</th>
              <th>有給付与日</th>
              <th>有給消化状況</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
              @if(isset($item->employee->dispPaidLeave))
            <tr>
              <td>{{ $item->name }}</td>
              <td></td>
              <td></td>
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
