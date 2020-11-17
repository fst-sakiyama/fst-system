<div class="form-group-sm">
  {{ Form::text('teamProjectId[0]['.$teamProjectId.']',$workLoad,['class'=>'col-md-4 calcWorkMin form-control text-right','id'=>'workLoad'.$teamProjectId,$teamProjectId === $nonOpe ? 'disabled' : ''])}}
</div>
