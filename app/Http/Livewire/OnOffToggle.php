<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class OnOffToggle extends Component
{
    // public Model $model;
    // public string $field;
    // public bool $active;

    // public function mount()
    // {
    //     $this->active = (bool) $this->model->getAttribute($this->field);
        
    // }

    // public function updated($field, $value)
    // {
        
    //     $this->model->setAttribute($this->field, $value)->save();
        
    // }
    public function render()
    {
        return view('livewire.on-off-toggle');
    }
}
