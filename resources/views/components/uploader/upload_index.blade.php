@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>{{ $masterProject -> projectName }}</h5>
        </div>
        <div class="card-body">
          <form action="{{action('UploaderController@upload')}}" method="post" enctype="multipart/form-data">
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
        <table class="table table-hover">
          <thead>
            <tr>
              <th>分類</th>
              <th>ファイル名</th>
              <th>保存日</th>
            </tr>
          </thead>
          <tbody>
          @foreach($filePosts as $item)
            <tr>
              <td>{{ $item->fileClassification->fileClassification }}</td>
              <td><a href="{{ asset('/file_show?id=') }}{{ $item->filePostId }}" target="_blank" rel="noopener noreferrer">{{ $item->fileName }}</td>
              <td>{{ $item->created_at }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center align-middle">
          {{ $filePosts->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
