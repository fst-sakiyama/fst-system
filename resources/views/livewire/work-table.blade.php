<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <h1>LiveWireTest</h1>
    {{ Form::select('shiftId',$masterShift,null,['class'=>'col-md-4','wire:model'=>'shiftId','wire:change'=>'onChange'])}}

    {{ $shiftId }}
</div>
