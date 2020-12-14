<?php

namespace App\Http\Livewire;

use App\Models\StudySession;
use Livewire\Component;

class StudySessionTest extends Component
{
    public $items;

    public function mount()
    {
        $this->items = StudySession::all();
    }

    public function delUser($id)
    {
        $item = StudySession::find($id);
        $item->delete();
        $this->items = StudySession::all();
    }

    public function render()
    {
        return view('livewire.study-session-test');
    }
}
