<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subscribe extends Component
{
    public function render()
    {
        return view('livewire.subscribe');
    }


    public function subscribe()
    {
        return redirect('/pricing');
    }
}
