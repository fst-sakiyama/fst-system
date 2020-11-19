<div>
  {{ Form::hidden('projectId',$projectId,['id'=>'projectId'.$filePostId])}}
  <td style="width:50%">
    <div id="correctBlock{{ $filePostId }}" class="">
      <a id="correctName{{ $filePostId }}" class="btn btn-sm btn-outline-info m-1 p-0">
        <i class="fas fa-pen"></i>
      </a>
      <span id="orgFileName{{ $filePostId }}">
        {{ $fileName }}
      </span>
    </div>
    <div id='correctItem{{$filePostId}}' class="form-group form-inline d-none">
      <a id='submitName{{$filePostId}}' class="btn btn-sm btn-outline-info m-1 p-0">
        <i class="fas fa-check text-success"></i>
      </a>
      {{ Form::text('fileName',mb_substr($fileName,0,mb_strpos($fileName,'.')),['class'=>'form-control form-control-sm col-md-8','id'=>'correctText'.$filePostId]) }}
      {{ Form::label('fileName',mb_substr($fileName,mb_strpos($fileName,'.'),mb_strlen($fileName)),['class'=>'col-form-label','id'=>'extension'.$filePostId]) }}
    </div>
  </td>
  <td style="width:18%">
    {{ $created_at }}
  </td>
  <td style="width:18%">
    <span id="updated_at{{ $filePostId }}">
      {{ $updated_at }}
    </span>
  </td>
  <td style="width:14%">
    <span class="row">
      <span class="col-md-8">
        {{ $userName }}
      </span>
      <span class="col-md-4">
        <i class="fas fa-times-circle text-danger" id="delItem{{ $filePostId }}"></i>
      </span>
    </span>
  </td>
</div>
