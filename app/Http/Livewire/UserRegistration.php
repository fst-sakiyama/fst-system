<?php

/**
 *  ライブワイヤ　ユーザー情報
 *
 *
 */

namespace App\Http\Livewire;

use Livewire\Component;

class UserRegistration extends Component
{
    public $item;

    public function mount($item)
    {
        $this->items=$item;
    }

    public function render()
    {
        return view('livewire.user-registration');
    }
}
