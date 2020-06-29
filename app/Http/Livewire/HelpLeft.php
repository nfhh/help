<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelpLeft extends Component
{
    public $categories;

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function getHelp($id)
    {
        $this->emit('getHelpDetail',$id);
    }

    public function render()
    {
        return view('livewire.help-left');
    }
}
