<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\VenueInterface;
use Illuminate\Http\Request;

class DeleteVenue extends Component
{
    public $url;
    public $slug;
    public $confirmingVenueDeletion = false;

    public function confirmVenueDeletion()
    {
        $this->dispatchBrowserEvent('confirming-delete-venue');

        $this->confirmingVenueDeletion = true;
    }

    public function cancelVenueDeletation()
    {
        
        $this->confirmingVenueDeletion = false;

        return redirect('/' . $this->url );
    } 

    public function deleteVenue(Request $request, VenueInterface $venueInterface)
    {
        if(Gate::allows('admin_only', auth()->user())){

            if ($this->url == 'venues')
            { 
                $venueInterface->deleteVenue($this->slug);
            }
           

            $request->session()->flash('flash.banner', 'Venue has been deleted succesfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/' . $this->url);

        } else {
        
            $request->session()->flash('flash.banner', 'Only Admin is allowed !');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/' . $this->url);
        }
    }
    public function render()
    {
        return view('livewire.delete-venue');
    }
}
