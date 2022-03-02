<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\StampInterface;

class SendMailButton extends Component
{
    public $campaignId;
    public $confirmingSendMailing = false;

    public function confirmSendMailing()
    {

        $this->dispatchBrowserEvent('confirming-send-mailing');

        $this->confirmingSendMailing = true;
    }

    public function cancelSendMailing()
    {
        $this->confirmingSendMailing = false;
        
        return redirect('/stamps');
    } 

    public function sendMailing()
    {
        // $this->resetErrorBag();


        if(Gate::allows('admin_only', auth()->user())){
            // $stampInterface->deleteStamp($this->slug);

            // $request->session()->flash('flash.banner', 'Stamp campaign has been deleted succesfully !');
            // $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/stamps/mail/'. $this->campaignId);

        } else {
            return redirect('/loyalty')->dangerBanner('Only Admin is allowed !');
        }

        return back();
    }

    public function render()
    {
        return view('livewire.send-mail-button');
    }
}
