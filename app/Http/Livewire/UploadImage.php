<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;

class UploadImage extends Component
{
    use WithFileUploads;
 
    public $image;

    public function save()
    {
        $this->validate([
            'image.*' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->image->store('images');
        
       
        session()->flash('success', 'Images has been successfully Uploaded.');
 
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.upload-image');
    }
}
