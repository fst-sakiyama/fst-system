<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FstSystemInformation;

class TopInformation extends Component
{
    public $item='';

    public function mount($item)
    {
        $this->item = $item;
    }

    public function onClick()
    {
        dd('livewireのonclick');
    }

    public function render()
    {
        return view('livewire.top-information');
    }
}
