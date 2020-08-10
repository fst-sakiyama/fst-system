@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnLinkButton',['item'=>'/upload?id='.$item->projectId])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">ファイル情報修正</h5>
        <div class="mt-3">
          {{ Form::open(array('route' => array('upload.update', $item->filePostId), 'method' => 'PUT')) }}
          {{ Form::hidden('filePostId', $item->filePostId) }}
          {{ Form::hidden('projectId', $item->projectId) }}
          <div class="form-group">
            {{ Form::label('fileClassificationId','分類',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::select('fileClassificationId',$masterFileClassifications,$item->fileClassificationId,['placeholder'=>'---分類を選択してください---','class'=>'col-md-4'])}}
            @error('fileClassificationId')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            {{ Form::label('fileName','ファイル名',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('fileName',pathinfo($item->fileName,PATHINFO_FILENAME),['placeholder'=>'ファイル名を入力','class'=>'col-md-4','id'=>'fileName']) }}
            .{{ pathinfo($item->fileURL,PATHINFO_EXTENSION) }}
            {{ Form::hidden('extension',pathinfo($item->fileURL,PATHINFO_EXTENSION)) }}
            @error('fileName')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="card-footer">
            <div class="form-group text-center">
              {{ Form::submit('情報更新',['class'=>'w-25 btn btn-primary']) }}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
