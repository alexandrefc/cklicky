<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateCampaignFullScreenImage extends Component
{
    use WithFileUploads;
 
    public $image;
    public $imagePath;
    
    public function render()
    {
        return view('livewire.update-campaign-full-screen-image');
    }
}
