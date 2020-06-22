@section('content')

<form action="{{action('UploaderController@upload')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

<h5>{{ $masterProject -> projectName }}</h5>
<input type="hidden" name = "projectId" value="{{ $masterProject->projectId}}">
<div class="form-group">
    <select id="fileClassificationId" class="form-control w-25" name="fileClassificationId">
      <option value="0" selected>分類</option>
      @foreach($masterFileClassifications as $masterFileClassification)
      <option value="{{ $masterFileClassification -> fileClassificationId }}">{{ $masterFileClassification -> fileClassification }}</option>
      @endforeach
    </select>
</div>

  <input type="file" name="file">
  <button type="submit">保存</button>
</form>

@endsection
