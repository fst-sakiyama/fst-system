@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $clientProject->project->client->clientName }}　様<br>{{ $clientProject->project->projectName }}</h5>
            </div>
            <div class="col-md text-right">
              <a href="{{asset('/upload?id=')}}{{$clientProject->teamProjectId}}"><button type="button" class="w-50 btn btn-primary">ファイル新規作成・更新・削除</button></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md">
              @if($clientProject->project_detail)
                {!! nl2br(e($clientProject->project_detail)) !!}
              @else
                <div class="text-secondary">案件説明が登録されておりません。</div>
              @endif
            </div>
          </div>
        </div>
        <table class="table mb-0 table-hover">
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
