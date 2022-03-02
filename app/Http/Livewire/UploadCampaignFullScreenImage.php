<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadCampaignFullScreenImage extends Component
{
    use WithFileUploads;
 
    public $image;
    
    public function render()
    {
        return view('livewire.upload-campaign-full-screen-image');
    }
}
