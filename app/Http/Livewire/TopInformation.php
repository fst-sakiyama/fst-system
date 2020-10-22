<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FstSystemInformation;
use Storage;

class TopInformation extends Component
{
    public $item = '';
    public $disabled = false;
    public $infoId = '';

    public function mount($item)
    {
        $this->item = $item;
        $this->infoId = $item->id;
        if($item->fileName){
          $this->disabled = true;
        }
    }

    public function onClick()
    {
        $item = FstSystemInformation::find($this->infoId);
        $filename = pathinfo($item->fileUrl,PATHINFO_BASENAME);
        Storage::disk('s3')->delete('/info/'.$filename);
        $item->fileName = null;
        $item->fileUrl = null;
        $item->save();

        $this->disabled = false;
    }

    public function render()
    {
        return view('livewire.top-information');
    }
}
