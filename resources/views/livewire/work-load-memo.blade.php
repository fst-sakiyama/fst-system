<div class="form-group-sm">
  {{ Form::text('teamProjectId[1]['.$teamProjectId.']',$memo,['class'=>'col-md form-control text-left','id'=>'memo'.$teamProjectId,$teamProjectId === $nonOpe ? 'disabled' : ''])}}
</div>
