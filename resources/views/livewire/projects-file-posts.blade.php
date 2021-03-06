<div>
  {{ Form::hidden('projectId',$projectId,['id'=>'projectId'.$filePostId])}}
  <td style="width:50%">
    <div id="pr_correctBlock{{ $filePostId }}" class="">
      <a id="pr_correctName{{ $filePostId }}" class="btn btn-sm btn-outline-info m-1 p-0">
        <i class="fas fa-pen"></i>
      </a>
      <span id="pr_orgFileName{{ $filePostId }}">
        {{ $fileName }}
      </span>
    </div>
    <div class="form-group form-inline d-none" id='pr_correctItem{{$filePostId}}'>
      <a id='pr_submitName{{$filePostId}}' class="btn btn-sm btn-outline-info m-1 p-0">
        <i class="fas fa-check text-success"></i>
      </a>
      {{ Form::text('fileName',mb_substr($fileName,0,mb_strpos($fileName,'.')),['class'=>'form-control form-control-sm col-md-8','id'=>'pr_correctText'.$filePostId]) }}
      {{ Form::label('fileName',mb_substr($fileName,mb_strpos($fileName,'.'),mb_strlen($fileName)),['class'=>'col-form-label','id'=>'pr_extension'.$filePostId]) }}
    </div>
  </td>
  <td style="width:18%">
    {{ $created_at }}
  </td>
  <td style="width:18%">
    <span id="pr_updated_at{{ $filePostId }}">
      {{ $updated_at }}
    </span>
  </td>
  <td style="width:14%">
    <span class="row">
      <span class="col-md-8">
        {{ $userName }}
      </span>
      <span class="col-md-4">
        <i class="fas fa-times-circle text-danger" id="pr_delItem{{ $filePostId }}"></i>
      </span>
    </span>
  </td>
</div>
