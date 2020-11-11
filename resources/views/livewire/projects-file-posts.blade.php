<div>
  {{ Form::hidden('projectId',$projectId,['id'=>'projectId'.$filePostId])}}
  <td style="width:50%">
    <div id="pr_correctBlock{{ $filePostId }}" class="">
      <a class="btn btn-sm btn-info m-1 p-0" id="pr_correctName{{ $filePostId }}">
        <i class="fas fa-pen"></i>
      </a>
      <span id="pr_orgFileName{{ $filePostId }}">
        {{ $fileName }}
      </span>
    </div>
    <div class="form-group form-inline d-none" id='pr_correctItem{{$filePostId}}'>
      {{ Form::text('fileName',substr($fileName,0,mb_strpos($fileName,'.')),['class'=>'form-control form-control-sm col-md-8','id'=>'pr_correctText'.$filePostId]) }}
      {{ Form::label('fileName',substr($fileName,mb_strpos($fileName,'.'),mb_strlen($fileName)),['class'=>'col-form-label']) }}
    </div>
  </td>
  <td style="width:18%">
    {{ $created_at }}
  </td>
  <td style="width:18%">
    {{ $updated_at }}
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
