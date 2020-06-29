<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelpRight extends Component
{
    protected $listeners = [
        'getHelpDetail'
    ];

    public function getHelpDetail()
    {
        dump(111);
    }

    public function render()
    {
        return view('livewire.help-right');
    }
}
