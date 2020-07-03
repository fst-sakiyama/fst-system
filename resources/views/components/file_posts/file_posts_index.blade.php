@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $clientProject->client->clientName }}　様　{{ $clientProject->projectName }}</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/upload?id=')}}{{$clientProject->projectId}}"><button type="button" class="w-50 btn btn-primary">ファイル新規作成・更新・削除</button></a>
            </div>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>分類</th>
              <th>ファイル名</th>
              <th>保存日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($items as $item)
            <tr>
              <td>{{ $item->fileClassification->fileClassification }}</td>
              <td><a href="{{ asset('/file_show?id=') }}{{ $item->filePostId }}" target="_blank" rel="noopener noreferrer">{{ $item->fileName }}</td>
              <td>{{ $item->created_at }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
