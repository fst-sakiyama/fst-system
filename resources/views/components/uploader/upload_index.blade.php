@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnLinkButton',['item'=>'/clients_detail?id='.$masterProject->clientId])</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>{{ $masterProject -> projectName }} | ファイルの新規作成・ファイル名変更・削除</h5>
        </div>
        <div class="card-body">
          <form action="{{route('upload.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name = "projectId" value="{{ $masterProject->projectId }}">
            <div class="form-group">
              {{ Form::label('fileClassificationId','分類を選択',['class'=>'col-md-2']) }}
              <span class="mr-2">：</span>
              <select id="fileClassificationId" class="col-md-4" name="fileClassificationId">
                <option value="0" selected>分類</option>
                  @foreach($masterFileClassifications as $masterFileClassification)
                    <option value="{{ $masterFileClassification -> fileClassificationId }}">{{ $masterFileClassification -> fileClassification }}</option>
                  @endforeach
              </select>
              @error('fileClassificationId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group ml-5">
              {{ Form::file('file') }}
              @error('file')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group text-center">
              {{ Form::submit('保存',['class'=>'w-25 btn btn-primary mt-3'])}}
            </div>
          </form>
        </div>
        <table class="table mb-0 table-hover">
          <thead>
            <tr>
              <th>分類</th>
              <th>ファイル名</th>
              <th>保存日</th>
              <th>削除</th>
            </tr>
          </thead>
          <tbody>
          @foreach($filePosts as $item)
            <tr>
              <td>{{ $item->fileClassification->fileClassification }}</td>
              <td><a href="{{ route('upload.edit',$item->filePostId) }}">{{ $item->fileName }}</td>
              <td>{{ $item->created_at }}</td>
              <td>
                <form action="{{ route('upload.destroy', $item->filePostId) }}" id="form_{{ $item->filePostId }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $item->filePostId }}" class="btn btn-danger deleteConf btn-sm">削除</a>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center align-middle">
          {{ $filePosts->onEachSide(2)->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
