<div class="form-group-sm">
  {{ Form::textarea('teamProjectId[1]['.$teamProjectId.']',$memo,['class'=>'workLoadMemo col-md form-control auto-resize memo'.$nowId,'rows'=>1,'id'=>'memo'.$teamProjectId,$teamProjectId === $nonOpe ? 'disabled' : ''])}}
</div>
