<div class="form-group-sm">
  {{ Form::text('teamProjectId[0]['.$teamProjectId.']',$workLoad,['class'=>'calcWorkMin form-control text-right workLoad'.$nowId,'id'=>'workLoad'.$teamProjectId,$teamProjectId === $nonOpe ? 'disabled' : ''])}}
</div>
