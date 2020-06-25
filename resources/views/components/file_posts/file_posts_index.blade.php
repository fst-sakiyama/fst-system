@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header row">
          <h5>{{ $clientProject->client->clientName }}　様　{{ $clientProject->projectName }}</h5>
          <div class="col-sm-6 text-right">
            <a href="{{asset('/upload?id=')}}{{$clientProject->projectId}}"><button type="button" class="w-50 btn btn-danger">新規登録</button></a>
          </div>
        </div>
        <table class="table">
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
