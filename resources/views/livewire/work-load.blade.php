<div>

  <!-- {{ Form::selectRange('workLoad',0,100,0,['class'=>'custom-select　custom-select-sm calcWorkMin']) }} -->
  <!-- {{ Form::select('workLoad',range(0,100,5),0,['class'=>'custom-select　custom-select-sm calcWorkMin']) }} -->
  {{ Form::text('projectId['.$projectId.']',null,['class'=>'col-md-4 calcWorkMin form-control text-right','wire:model'=>'modelTest'])}}
</div>
